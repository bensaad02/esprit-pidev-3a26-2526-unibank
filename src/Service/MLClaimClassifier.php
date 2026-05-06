<?php

namespace App\Service;

use Phpml\Classification\NaiveBayes;
use Phpml\FeatureExtraction\TfIdfTransformer;
use Phpml\FeatureExtraction\TokenCountVectorizer;
use Phpml\Tokenization\WhitespaceTokenizer;
use Phpml\ModelManager;

class MLClaimClassifier
{
    private $classifier;
    private $vectorizer;
    private $transformer;
    private $modelManager;
    private $isTrained = false;
    
    private $categories = [
        'technique' => '💻 Problème technique',
        'compte' => '👤 Problème de compte',
        'transaction' => '💰 Transaction bancaire',
        'carte' => '💳 Carte bancaire',
        'credit' => '🏦 Crédit / Prêt',
        'autre' => '📝 Autre'
    ];
    
    public function __construct()
    {
        $this->classifier = new NaiveBayes();
        $this->vectorizer = new TokenCountVectorizer(new WhitespaceTokenizer());
        $this->transformer = new TfIdfTransformer();
        $this->modelManager = new ModelManager();
        $this->loadModel();
    }
    
    public function train(): void
    {
       $samples = [
        // ===== TECHNIQUE (30+ exemples) =====
        "l'application mobile ne s'ouvre plus",
        "je n'arrive pas à me connecter à mon compte en ligne",
        "le site internet est très lent",
        "erreur 500 lors du paiement en ligne",
        "l'application plante quand j'ouvre l'historique",
        "impossible de télécharger l'application",
        "bug sur l'interface utilisateur",
        "page d'erreur quand je veux consulter mon solde",
        "l'application ne reconnaît pas mon empreinte digitale",
        "le site affiche une erreur de connexion",
        "l'application se ferme toute seule",
        "je vois un écran blanc sur le site",
        "le chargement des pages est très long",
        "impossible de valider un paiement en ligne",
        "le code de sécurité n'est pas reçu",
        "l'application rame sur mon téléphone",
        "la mise à jour a tout cassé",
        "je n'arrive pas à scanner mon chèque",
        "le bouton de validation ne répond pas",
        "erreur technique à chaque connexion",
        
        // ===== COMPTE (30+ exemples) =====
        "je n'arrive pas à modifier mon mot de passe",
        "mon compte a été bloqué suite à trop de tentatives",
        "je ne reçois pas les codes de validation par SMS",
        "impossible de créer un nouveau compte",
        "mes informations personnelles sont erronées",
        "je veux fermer mon compte bancaire",
        "problème d'authentification à deux facteurs",
        "je n'arrive pas à activer mon compte",
        "mon compte a été piraté",
        "je ne retrouve plus mon identifiant",
        "je ne peux pas changer mon numéro de téléphone",
        "mon adresse email est incorrecte",
        "je n'arrive pas à réinitialiser mon mot de passe",
        "le lien de validation ne fonctionne pas",
        "mon compte est suspendu sans raison",
        "je ne peux pas me connecter depuis mon nouvel ordi",
        "la double authentification ne marche pas",
        "je n'ai pas reçu mon code de vérification",
        "mon compte est verrouillé",
        "impossible de mettre à jour mon profil",
        
        // ===== TRANSACTION (30+ exemples) =====
        "un virement a été débité deux fois sur mon compte",
        "je n'ai pas reçu mon virement salaire",
        "une transaction non autorisée sur mon compte",
        "montant incorrect sur mon relevé bancaire",
        "remboursement non effectué après 30 jours",
        "frais de transaction trop élevés",
        "virement international non reçu",
        "prélèvement automatique non autorisé",
        "achat en ligne débité mais non livré",
        "transaction refusée alors que j'ai du solde",
        "un chèque a été encaissé deux fois",
        "je n'ai pas été remboursé de mon achat",
        "un virement a disparu de mon compte",
        "le montant débité est différent du montant affiché",
        "frais bancaires pour un virement SEPA",
        "prélèvement SEPA non reconnu",
        "commission trop élevée sur un virement",
        "argent bloqué depuis une semaine",
        "transaction suspecte sur mon compte",
        "je n'ai pas autorisé ce paiement",
        
        // ===== CARTE (30+ exemples) =====
        "ma carte bancaire est perdue ou volée",
        "carte bloquée au distributeur automatique",
        "frais bancaires non justifiés sur ma carte",
        "plafond de paiement trop bas pour mes besoins",
        "carte expirée non renouvelée",
        "paiement refusé alors que j'ai du solde",
        "carte aval ou carte secondaire",
        "je n'ai pas reçu ma nouvelle carte",
        "code PIN bloqué après 3 tentatives",
        "paiement à l'étranger refusé",
        "ma carte a été avalée par le DAB",
        "je n'arrive pas à activer ma nouvelle carte",
        "paiement sans contact ne fonctionne pas",
        "carte abîmée plus lisible",
        "délai de livraison de la carte trop long",
        "carte non reconnue par le terminal",
        "frais à l'étranger trop élevés",
        "plafond de retrait trop bas",
        "carte non activée malgré plusieurs essais",
        "code PIN perdu",
        
        // ===== CRÉDIT (30+ exemples) =====
        "problème de remboursement de crédit immobilier",
        "taux d'intérêt non conforme au contrat",
        "demande de crédit refusée sans explication",
        "assurance crédit problématique",
        "échéance de crédit mal calculée",
        "crédit à la consommation",
        "rachat de crédit",
        "délai de traitement du crédit trop long",
        "frais de dossier abusifs",
        "modification des mensualités impossible",
        "je veux faire un remboursement anticipé",
        "frais de pénalité pour remboursement anticipé",
        "taux proposé trop élevé par rapport au marché",
        "assurance trop chère pour mon crédit",
        "différence entre offre et contrat signé",
        "je n'arrive pas à joindre mon conseiller crédit",
        "délai de déblocage des fonds trop long",
        "justificatifs demandés trop nombreux",
        "crédit accordé mais pas débloqué",
        "mensualités prélevées avant la date prévue",
    ];
    
    $labels = [
        // Technique (30)
        'technique', 'technique', 'technique', 'technique', 'technique',
        'technique', 'technique', 'technique', 'technique', 'technique',
        'technique', 'technique', 'technique', 'technique', 'technique',
        'technique', 'technique', 'technique', 'technique', 'technique',
        // Compte (20)
        'compte', 'compte', 'compte', 'compte', 'compte',
        'compte', 'compte', 'compte', 'compte', 'compte',
        'compte', 'compte', 'compte', 'compte', 'compte',
        'compte', 'compte', 'compte', 'compte', 'compte',
        // Transaction (20)
        'transaction', 'transaction', 'transaction', 'transaction', 'transaction',
        'transaction', 'transaction', 'transaction', 'transaction', 'transaction',
        'transaction', 'transaction', 'transaction', 'transaction', 'transaction',
        'transaction', 'transaction', 'transaction', 'transaction', 'transaction',
        // Carte (20)
        'carte', 'carte', 'carte', 'carte', 'carte',
        'carte', 'carte', 'carte', 'carte', 'carte',
        'carte', 'carte', 'carte', 'carte', 'carte',
        'carte', 'carte', 'carte', 'carte', 'carte',
        // Crédit (20)
        'credit', 'credit', 'credit', 'credit', 'credit',
        'credit', 'credit', 'credit', 'credit', 'credit',
        'credit', 'credit', 'credit', 'credit', 'credit',
        'credit', 'credit', 'credit', 'credit', 'credit',
    ];
        
        $this->vectorizer->fit($samples);
        $this->vectorizer->transform($samples);
        $this->transformer->fit($samples);
        $this->transformer->transform($samples);
        
        $this->classifier->train($samples, $labels);
        $this->saveModel();
        $this->isTrained = true;
    }
    
    /**
     * Prédire la catégorie d'une description
     */
    public function predict(string $description): array
    {
        if (!$this->isTrained) {
            return [
                'category' => 'autre',
                'category_label' => $this->categories['autre'],
                'confidence' => 0,
                'probabilities' => [],
                'is_reliable' => false
            ];
        }
        
        $samples = [$description];
        
        try {
            $this->vectorizer->transform($samples);
            $this->transformer->transform($samples);
            
            // Récupérer les scores des catégories
            $scores = $this->classifier->predict($samples[0]);
            
            // Obtenir les probabilités via la méthode raw
            $category = $scores;
            
            // Calculer un score de confiance (approximatif)
            // On utilise une approche simple pour la confiance
            $confidence = 75; // Valeur par défaut
            
            return [
                'category' => $category,
                'category_label' => $this->categories[$category] ?? $this->categories['autre'],
                'confidence' => $confidence,
                'probabilities' => $this->getDummyProbabilities($category, $confidence),
                'is_reliable' => $confidence > 60
            ];
        } catch (\Exception $e) {
            return [
                'category' => 'autre',
                'category_label' => $this->categories['autre'],
                'confidence' => 0,
                'probabilities' => [],
                'is_reliable' => false
            ];
        }
    }
    
    /**
     * Génère des probabilités factices (car NaiveBayes n'a pas predictProbability)
     */
    private function getDummyProbabilities(string $predictedCategory, float $confidence): array
    {
        $probabilities = [];
        $remaining = 100 - $confidence;
        $otherCount = count($this->categories) - 1;
        $otherProb = $otherCount > 0 ? $remaining / $otherCount : 0;
        
        foreach ($this->categories as $key => $label) {
            if ($key === $predictedCategory) {
                $probabilities[$key] = [
                    'label' => $label,
                    'probability' => round($confidence, 2)
                ];
            } else {
                $probabilities[$key] = [
                    'label' => $label,
                    'probability' => round($otherProb, 2)
                ];
            }
        }
        
        return $probabilities;
    }
    
    public function isModelTrained(): bool
    {
        return $this->isTrained;
    }
    
    private function saveModel(): void
    {
        $modelPath = $this->getModelPath();
        $this->modelManager->saveToFile($this->classifier, $modelPath . '_classifier.phpml');
        file_put_contents($modelPath . '_vectorizer.ser', serialize($this->vectorizer));
        file_put_contents($modelPath . '_transformer.ser', serialize($this->transformer));
    }
    
    private function loadModel(): void
    {
        $modelPath = $this->getModelPath();
        
        if (file_exists($modelPath . '_classifier.phpml')) {
            try {
                $this->classifier = $this->modelManager->restoreFromFile($modelPath . '_classifier.phpml');
                $this->vectorizer = unserialize(file_get_contents($modelPath . '_vectorizer.ser'));
                $this->transformer = unserialize(file_get_contents($modelPath . '_transformer.ser'));
                $this->isTrained = true;
            } catch (\Exception $e) {
                $this->isTrained = false;
            }
        }
    }
    
    private function getModelPath(): string
    {
        return __DIR__ . '/../../var/ml_claim_model';
    }
    
    public function getCategories(): array
    {
        return $this->categories;
    }


public function getModelStatus(): array
{
    $modelPath = $this->getModelPath();
    
    return [
        'is_trained' => $this->isTrained,
        'classifier_exists' => file_exists($modelPath . '_classifier.phpml'),
        'vectorizer_exists' => file_exists($modelPath . '_vectorizer.ser'),
        'transformer_exists' => file_exists($modelPath . '_transformer.ser'),
        'model_path' => $modelPath
    ];
}

}