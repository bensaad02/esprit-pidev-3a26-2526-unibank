<?php

namespace App\Service;

/**
 * Modèle IA de résumé automatique - Version 100% maison
 * Avec intégration du service d'analyse de sentiment existant
 */
class TextSummarizer
{
    private $stopWords = [];
    private $minSentenceLength = 30;
    private $maxSentenceLength = 300;
    private $sentimentService;
    
    public function __construct(?SentimentAnalysisService $sentimentService = null)
    {
        $this->loadStopWords();
        $this->sentimentService = $sentimentService;
    }
    
    /**
     * Méthode principale - Génère le résumé
     */
    public function summarize(string $text, int $maxSentences = 3, string $type = null): array
    {
        // Étape 1: Nettoyage et préparation
        $cleanText = $this->cleanText($text);
        
        // Étape 2: Découpage en phrases
        $sentences = $this->splitIntoSentences($cleanText);
        
        if (count($sentences) <= $maxSentences) {
            return $this->formatSummary($text, $sentences, 100, $type);
        }
        
        // Étape 3: Calcul du score pour chaque phrase
        $sentenceScores = $this->calculateSentenceScores($sentences);
        
        // Étape 4: Application des boosters (position, longueur, mots-clés)
        $sentenceScores = $this->applyBoosters($sentences, $sentenceScores, $type);
        
        // Étape 5: Sélection des meilleures phrases
        $selectedIndices = $this->selectTopSentences($sentenceScores, $maxSentences);
        
        // Étape 6: Reconstruction du résumé dans l'ordre original
        $summarySentences = $this->buildSummary($sentences, $selectedIndices);
        
        // Étape 7: Post-traitement et formatage
        $summarySentences = $this->postProcessSummary($summarySentences);
        
        // Étape 8: Calcul du niveau de confiance
        $confidence = $this->calculateConfidence($sentenceScores, $selectedIndices);
        
        return $this->formatSummary($text, $summarySentences, $confidence, $type);
    }
    
    /**
     * Calcule le score de chaque phrase
     * Algorithme: TF-IDF maison
     */
    private function calculateSentenceScores(array $sentences): array
    {
        // Extraire tous les mots de toutes les phrases
        $allWords = [];
        $sentenceWords = [];
        
        foreach ($sentences as $i => $sentence) {
            $words = $this->tokenize($sentence);
            $sentenceWords[$i] = $words;
            $allWords = array_merge($allWords, $words);
        }
        
        // Calculer la fréquence des mots (TF simplifié)
        $wordFrequency = array_count_values($allWords);
        
        // Calculer le score TF-IDF pour chaque phrase
        $scores = [];
        foreach ($sentenceWords as $i => $words) {
            $score = 0;
            $wordCount = count($words);
            
            foreach ($words as $word) {
                // TF (Term Frequency)
                $tf = $wordFrequency[$word] / max(1, $wordCount);
                
                // IDF simplifié (Inverse Document Frequency)
                $idf = log(count($sentences) / (1 + $this->countDocumentsContainingWord($word, $sentenceWords)));
                
                // Score du mot
                $wordScore = $tf * $idf;
                $score += $wordScore;
            }
            
            // Normalisation par longueur de phrase
            $scores[$i] = $score / max(1, sqrt($wordCount));
        }
        
        // Normalisation entre 0 et 1
        $maxScore = max($scores);
        if ($maxScore > 0) {
            foreach ($scores as $i => $score) {
                $scores[$i] = $score / $maxScore;
            }
        }
        
        return $scores;
    }
    
    /**
     * Applique des boosters pour améliorer la pertinence
     */
    private function applyBoosters(array $sentences, array $scores, ?string $type): array
    {
        $boostedScores = $scores;
        $totalSentences = count($sentences);
        
        foreach ($sentences as $i => $sentence) {
            $boost = 0;
            
            // Booster 1: Position (première phrase = importante)
            if ($i === 0) {
                $boost += 0.3;
            }
            
            // Booster 2: Dernière phrase (conclusion)
            if ($i === $totalSentences - 1) {
                $boost += 0.2;
            }
            
            // Booster 3: Longueur idéale (entre 50 et 150 caractères)
            $length = strlen($sentence);
            if ($length >= 50 && $length <= 150) {
                $boost += 0.15;
            } elseif ($length >= 30 && $length <= 200) {
                $boost += 0.05;
            }
            
            // Booster 4: Mots-clés spécifiques au type de réclamation
            if ($type) {
                $typeKeywords = $this->getTypeKeywords($type);
                $sentenceLower = strtolower($sentence);
                foreach ($typeKeywords as $keyword) {
                    if (strpos($sentenceLower, $keyword) !== false) {
                        $boost += 0.1;
                    }
                }
            }
            
            // Booster 5: Présence de chiffres (dates, montants)
            if (preg_match('/\d+/', $sentence)) {
                $boost += 0.1;
            }
            
            // Booster 6: Présence de mots d'importance
            $importantWords = ['urgence', 'important', 'problème', 'erreur', 'bloqué'];
            $sentenceLower = strtolower($sentence);
            foreach ($importantWords as $word) {
                if (strpos($sentenceLower, $word) !== false) {
                    $boost += 0.08;
                }
            }
            
            $boostedScores[$i] = min(1, $scores[$i] + $boost);
        }
        
        return $boostedScores;
    }
    
    /**
     * Sélectionne les meilleures phrases sans répétition
     */
    private function selectTopSentences(array $scores, int $maxSentences): array
    {
        // Copier et trier les scores
        $sortedScores = $scores;
        arsort($sortedScores);
        
        // Sélectionner les indices des meilleures phrases
        $selectedIndices = array_keys(array_slice($sortedScores, 0, $maxSentences, true));
        
        sort($selectedIndices); // Remettre dans l'ordre original
        return $selectedIndices;
    }
    
    /**
     * Reconstruit le résumé à partir des phrases sélectionnées
     */
    private function buildSummary(array $sentences, array $selectedIndices): array
    {
        $summary = [];
        foreach ($selectedIndices as $index) {
            $summary[] = $sentences[$index];
        }
        return $summary;
    }
    
    /**
     * Post-traitement pour améliorer la lisibilité
     */
    private function postProcessSummary(array $summarySentences): array
    {
        $processed = [];
        
        foreach ($summarySentences as $sentence) {
            // Supprimer les répétitions
            $sentence = preg_replace('/\b(\w+)(?:\s+\1\b)+/i', '$1', $sentence);
            
            // Nettoyer les espaces multiples
            $sentence = preg_replace('/\s+/', ' ', $sentence);
            
            // Ajouter un point final si nécessaire
            if (!preg_match('/[.!?]$/', $sentence)) {
                $sentence .= '.';
            }
            
            // Capitaliser la première lettre
            $sentence = ucfirst($sentence);
            
            $processed[] = trim($sentence);
        }
        
        return $processed;
    }
    
    /**
     * Tokenisation maison
     */
    private function tokenize(string $text): array
    {
        // Mettre en minuscules
        $text = strtolower($text);
        
        // Supprimer la ponctuation
        $text = preg_replace('/[[:punct:]]/', ' ', $text);
        
        // Supprimer les chiffres
        $text = preg_replace('/[0-9]+/', '', $text);
        
        // Diviser en mots
        $words = explode(' ', $text);
        
        // Filtrer les stop words et mots trop courts
        $words = array_filter($words, function($word) {
            return strlen($word) > 2 && !in_array($word, $this->stopWords);
        });
        
        return array_values($words);
    }
    
    /**
     * Découpage intelligent en phrases
     */
    private function splitIntoSentences(string $text): array
    {
        // Pattern pour détecter les fins de phrase
        $pattern = '/(?<=[.!?])\s+(?=[A-ZÀ-Ü])/u';
        $sentences = preg_split($pattern, $text);
        
        // Filtrer les phrases trop courtes
        $sentences = array_filter($sentences, function($sentence) {
            return strlen(trim($sentence)) >= $this->minSentenceLength;
        });
        
        // Limiter la longueur des phrases
        $sentences = array_map(function($sentence) {
            if (strlen($sentence) > $this->maxSentenceLength) {
                // Couper à la dernière ponctuation avant la limite
                $cut = substr($sentence, 0, $this->maxSentenceLength);
                $lastPunct = strrpos($cut, '.');
                if ($lastPunct > 0) {
                    $sentence = substr($cut, 0, $lastPunct + 1);
                }
            }
            return trim($sentence);
        }, $sentences);
        
        return array_values($sentences);
    }
    
    /**
     * Nettoie le texte (URLs, emails, caractères spéciaux)
     */
    private function cleanText(string $text): string
    {
        // Supprimer les URLs
        $text = preg_replace('/https?:\/\/\S+/', '', $text);
        
        // Supprimer les emails
        $text = preg_replace('/\S+@\S+\.\S+/', '', $text);
        
        // Supprimer les caractères non imprimables
        $text = preg_replace('/[^\p{L}\p{N}\s\.\!\?]/u', ' ', $text);
        
        // Normaliser les espaces
        $text = preg_replace('/\s+/', ' ', $text);
        
        return trim($text);
    }
    
    /**
     * Compte dans combien de documents apparaît un mot
     */
    private function countDocumentsContainingWord(string $word, array $sentenceWords): int
    {
        $count = 0;
        foreach ($sentenceWords as $words) {
            if (in_array($word, $words)) {
                $count++;
            }
        }
        return $count;
    }
    
    /**
     * Mots-clés par type de réclamation
     */
    private function getTypeKeywords(string $type): array
    {
        $keywords = [
            'technique' => ['application', 'site', 'bug', 'erreur', 'plante', 'lent', 'mobile', 'connecter'],
            'compte' => ['compte', 'mot de passe', 'identifiant', 'bloqué', 'activer', 'fermer'],
            'transaction' => ['virement', 'transaction', 'paiement', 'débit', 'crédit', 'remboursement'],
            'carte' => ['carte', 'distributeur', 'plafond', 'pin', 'volée', 'perdue'],
            'credit' => ['crédit', 'prêt', 'remboursement', 'taux', 'mensualite']
        ];
        
        return $keywords[$type] ?? [];
    }
    
    /**
     * Charge la liste des stop words français
     */
    private function loadStopWords(): void
    {
        $this->stopWords = [
            'le', 'la', 'les', 'un', 'une', 'de', 'du', 'des', 'et', 'ou',
            'mais', 'donc', 'car', 'pour', 'dans', 'avec', 'sans', 'par',
            'sur', 'sous', 'je', 'tu', 'il', 'elle', 'nous', 'vous', 'ils',
            'elles', 'ce', 'cet', 'cette', 'ces', 'mon', 'ton', 'son',
            'notre', 'votre', 'leur', 'que', 'qui', 'quoi', 'dont', 'où',
            'est', 'sont', 'était', 'étaient', 'sera', 'seront', 'a', 'ont',
            'avait', 'avaient', 'aura', 'auront', 'fait', 'faire', 'être'
        ];
    }
    
    /**
     * Calcule le niveau de confiance du résumé
     */
    private function calculateConfidence(array $scores, array $selectedIndices): int
    {
        $selectedScores = [];
        foreach ($selectedIndices as $index) {
            $selectedScores[] = $scores[$index];
        }
        
        $averageScore = array_sum($selectedScores) / count($selectedScores);
        
        // Plus le résumé est court, plus la confiance est élevée (jusqu'à un certain point)
        $lengthConfidence = min(1, count($selectedIndices) / 5);
        
        $confidence = ($averageScore * 0.7 + $lengthConfidence * 0.3) * 100;
        
        return min(95, max(50, round($confidence)));
    }
    
    /**
     * Analyse le sentiment du texte (utilise le service existant ou fallback local)
     */
    private function analyzeSentiment(string $text): array
    {
        // Priorité au service API Hugging Face
        if ($this->sentimentService) {
            try {
                $apiResult = $this->sentimentService->analyserSentiment($text);
                if ($apiResult && isset($apiResult['sentiment'])) {
                    return [
                        'type' => $apiResult['sentiment'],
                        'estInsatisfait' => $apiResult['estInsatisfait'] ?? ($apiResult['sentiment'] === 'negatif'),
                        'source' => 'huggingface_api',
                        'score' => $apiResult['score'] ?? 0
                    ];
                }
            } catch (\Exception $e) {
                // Fallback au sentiment local si l'API échoue
                return $this->localSentimentAnalysis($text);
            }
        }
        
        // Fallback local
        return $this->localSentimentAnalysis($text);
    }
    
    /**
     * Analyse de sentiment locale (fallback si pas d'API)
     */
    private function localSentimentAnalysis(string $text): array
    {
        $sentiments = [
            'tristesse' => ['tristesse', 'triste', 'désespoir', 'désespéré', 'déçu', 'abattu', 'peine', 'chagrin', 'larmes', 'déception'],
            'colere' => ['colère', 'furieux', 'scandalisé', 'honte', 'inacceptable', 'révoltant', 'indigné', 'exaspéré', 'frustré'],
            'satisfaction' => ['merci', 'bravo', 'satisfait', 'content', 'ravi', 'reconnaissant', 'heureux', 'parfait'],
            'urgence' => ['urgence', 'immédiat', 'rapidement', 'dès que possible', 'aujourdhui', 'maintenant']
        ];
        
        $textLower = strtolower($text);
        $detected = [];
        
        foreach ($sentiments as $sentiment => $keywords) {
            foreach ($keywords as $keyword) {
                if (strpos($textLower, $keyword) !== false) {
                    $detected[] = $sentiment;
                    break;
                }
            }
        }
        
        // Déterminer le sentiment principal
        if (in_array('colere', $detected)) {
            $type = 'negatif';
            $estInsatisfait = true;
            $emoji = '😡';
        } elseif (in_array('tristesse', $detected)) {
            $type = 'negatif';
            $estInsatisfait = true;
            $emoji = '😢';
        } elseif (in_array('satisfaction', $detected)) {
            $type = 'positif';
            $estInsatisfait = false;
            $emoji = '😊';
        } elseif (in_array('urgence', $detected)) {
            $type = 'urgent';
            $estInsatisfait = true;
            $emoji = '⚠️';
        } else {
            $type = 'neutre';
            $estInsatisfait = false;
            $emoji = '😐';
        }
        
        return [
            'type' => $type,
            'estInsatisfait' => $estInsatisfait,
            'source' => 'local_fallback',
            'emoji' => $emoji,
            'mots_cles' => $detected
        ];
    }
    
    /**
     * Extrait les informations clés (dates, montants, références, téléphone, email)
     */
    private function extractKeyInformation(string $text): array
    {
        $info = [];
        
        // Dates (format JJ/MM/AAAA ou JJ-MM-AAAA)
        if (preg_match('/(\d{1,2}[\/\-]\d{1,2}[\/\-]\d{2,4})/', $text, $date)) {
            $info['date'] = $date[1];
        }
        
        // Montants (ex: 1500€, 1500 €, 1 500€)
        if (preg_match('/(\d+(?:[.,]\d+)?)\s*[€$£]/', $text, $amount)) {
            $info['amount'] = $amount[1] . '€';
        }
        
        // Références bancaires (IBAN, numéros de compte)
        if (preg_match('/[A-Z]{2}\d{2}[A-Z0-9]{4,}/', $text, $ref)) {
            $info['reference_bancaire'] = $ref[0];
        } elseif (preg_match('/[A-Z0-9]{8,}/', $text, $ref)) {
            $info['reference'] = $ref[0];
        }
        
        // Téléphone (format français)
        if (preg_match('/(?:\+33|0)[67]\d{8}/', $text, $phone)) {
            $info['telephone'] = $phone[0];
        } elseif (preg_match('/0[67]\s?\d{2}\s?\d{2}\s?\d{2}\s?\d{2}/', $text, $phone)) {
            $info['telephone'] = $phone[0];
        }
        
        // Email
        if (preg_match('/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/', $text, $email)) {
            $info['email'] = $email[0];
        }
        
        // Nom du client (majuscules)
        if (preg_match('/([A-Z][a-z]+(?:\s+[A-Z][a-z]+)*\s+([A-Z]{2,}))/u', $text, $name)) {
            $info['nom_client'] = $name[1];
        } elseif (preg_match('/\b([A-Z]{2,})\b/', $text, $name)) {
            // Éviter de confondre avec des références
            if (!preg_match('/^[A-Z]{2}\d{2}/', $name[1]) && strlen($name[1]) < 20) {
                $info['nom_client'] = $name[1];
            }
        }
        
        return $info;
    }
    
    /**
     * Génère un titre intelligent avec intégration du sentiment
     */
    private function generateTitle(string $summary, ?string $type): string
    {
        // Analyse du sentiment
        $sentiment = $this->analyzeSentiment($summary);
        
        // Déterminer l'emoji et le préfixe selon le sentiment
        $prefix = '';
        $emoji = '';
        
        if ($sentiment['type'] === 'negatif') {
            if ($sentiment['estInsatisfait']) {
                $emoji = '😡';
                $prefix = 'CLIENT MÉCONTENT';
            } else {
                $emoji = '😢';
                $prefix = 'CLIENT DÉÇU';
            }
        } elseif ($sentiment['type'] === 'urgent') {
            $emoji = '⚠️🚨';
            $prefix = 'URGENCE -';
        } elseif ($sentiment['type'] === 'positif') {
            $emoji = '😊';
            $prefix = 'CLIENT SATISFAIT';
        }
        
        // Titre par type de réclamation
        if ($type) {
            $typeTitles = [
                'technique' => 'Problème Technique',
                'compte' => 'Problème de Compte',
                'transaction' => 'Anomalie Transactionnelle',
                'carte' => 'Problème Carte Bancaire',
                'credit' => 'Demande Crédit'
            ];
            $baseTitle = $typeTitles[$type] ?? 'Réclamation Client';
        } else {
            // Extraire les premiers mots significatifs
            $words = explode(' ', $summary);
            $titleWords = array_slice($words, 0, 5);
            $baseTitle = implode(' ', $titleWords);
        }
        
        // Construction du titre final
        if ($prefix) {
            $title = trim($emoji . ' ' . $prefix . ' - ' . $baseTitle);
        } else {
            $title = $baseTitle;
        }
        
        return ucfirst($title);
    }
    
    /**
     * Détecte le type de réclamation à partir du résumé
     */
    private function detectType(string $text): string
    {
        $types = [
            'technique' => ['application', 'site', 'bug', 'erreur', 'plante'],
            'compte' => ['compte', 'mot de passe', 'identifiant', 'bloqué'],
            'transaction' => ['virement', 'transaction', 'paiement', 'remboursement'],
            'carte' => ['carte', 'distributeur', 'plafond', 'pin'],
            'credit' => ['crédit', 'prêt', 'remboursement', 'taux']
        ];
        
        $textLower = strtolower($text);
        $scores = [];
        
        foreach ($types as $type => $keywords) {
            $score = 0;
            foreach ($keywords as $keyword) {
                if (strpos($textLower, $keyword) !== false) {
                    $score++;
                }
            }
            $scores[$type] = $score;
        }
        
        arsort($scores);
        return current($scores) > 0 ? key($scores) : 'autre';
    }
    
    /**
     * Formate le résultat final avec analyse de sentiment intégrée
     */
    private function formatSummary(string $original, array $summarySentences, int $confidence, ?string $type): array
    {
        $summaryText = implode(' ', $summarySentences);
        
        // Extraction des informations clés
        $keyInfo = $this->extractKeyInformation($summaryText);
        
        // Analyse de sentiment complète
        $sentimentAnalysis = $this->analyzeSentiment($original);
        
        // Ajouter le sentiment aux infos clés
        $keyInfo['sentiment'] = [
            'type' => $sentimentAnalysis['type'],
            'estInsatisfait' => $sentimentAnalysis['estInsatisfait'],
            'source' => $sentimentAnalysis['source'],
            'emoji' => $sentimentAnalysis['emoji'] ?? $this->getSentimentEmoji($sentimentAnalysis['type'])
        ];
        
        // Génération du titre
        $title = $this->generateTitle($summaryText, $type);
        
        return [
            'title' => $title,
            'summary' => $summaryText,
            'original_length' => strlen($original),
            'summary_length' => strlen($summaryText),
            'compression_rate' => round((1 - strlen($summaryText) / max(1, strlen($original))) * 100),
            'sentences_count' => count($summarySentences),
            'confidence' => $confidence,
            'key_information' => $keyInfo,
            'sentiment' => $sentimentAnalysis,
            'type_detected' => $type ?? $this->detectType($summaryText)
        ];
    }
    
    /**
     * Retourne l'emoji correspondant au sentiment
     */
    private function getSentimentEmoji(string $sentimentType): string
    {
        $emojis = [
            'negatif' => '😡',
            'positif' => '😊',
            'neutre' => '😐',
            'urgent' => '⚠️'
        ];
        
        return $emojis[$sentimentType] ?? '📝';
    }
}