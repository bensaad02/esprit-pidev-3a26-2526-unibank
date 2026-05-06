<?php
// src/Service/DuplicateDetectionService.php
namespace App\Service;

use Psr\Log\LoggerInterface;
use GuzzleHttp\Client;

class DuplicateDetectionService
{
    private Client $httpClient;
    private string $apiKey;
    private LoggerInterface $logger;

    public function __construct(string $edenAiKey, LoggerInterface $logger)
    {
        $this->apiKey = $edenAiKey;
        $this->logger = $logger;
        $this->httpClient = new Client([
            'timeout' => 30,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ]
        ]);
    }

    public function detecterDoublon(string $nouveauTexte, array $reclamationsExistantes): array
    {
        if (empty($reclamationsExistantes)) {
            return [
                'est_doublon' => false,
                'similarite' => 0,
                'message' => null
            ];
        }

        try {
            // Extraire les textes existants
            $textesExistants = [];
            foreach ($reclamationsExistantes as $reclamation) {
                $textesExistants[] = $reclamation->getDescription();
            }
            
            // Appel à l'API Eden AI
            $response = $this->httpClient->post('https://api.edenai.run/v2/text/similarity', [
                'json' => [
                    'providers' => 'google',  // Utilise Google AI (gratuit)
                    'texts' => array_merge([$nouveauTexte], $textesExistants)
                ]
            ]);

            $result = json_decode($response->getBody(), true);
            $this->logger->info('Résultat Eden AI: ' . json_encode($result));

            // Analyser les résultats
            if (isset($result['google']['items'])) {
                $similariteMax = 0;
                $doublonIndex = null;
                
                foreach ($result['google']['items'] as $item) {
                    if ($item['similarity_score'] > $similariteMax) {
                        $similariteMax = $item['similarity_score'];
                        $doublonIndex = $item['second_text_index'] ?? null;
                    }
                }
                
                $estDoublon = $similariteMax > 0.7;
                $doublonId = $estDoublon && $doublonIndex !== null 
                    ? $reclamationsExistantes[$doublonIndex - 1]->getId() 
                    : null;
                
                return [
                    'est_doublon' => $estDoublon,
                    'similarite' => round($similariteMax * 100, 2),
                    'doublon_id' => $doublonId,
                    'message' => $estDoublon ? '⚠️ Cette réclamation ressemble à une précédente (#' . $doublonId . '). Similarité: ' . round($similariteMax * 100, 2) . '%' : null
                ];
            }
            
            return [
                'est_doublon' => false,
                'similarite' => 0,
                'message' => null
            ];

        } catch (\Exception $e) {
            $this->logger->error('Erreur Eden AI: ' . $e->getMessage());
            return $this->detecterDoublonLocal($nouveauTexte, $reclamationsExistantes);
        }
    }

    private function detecterDoublonLocal(string $nouveauTexte, array $reclamationsExistantes): array
    {
        $similariteMax = 0;
        $doublonId = null;
        
        $nouveauTexteNet = $this->nettoyerTexte($nouveauTexte);
        
        foreach ($reclamationsExistantes as $reclamation) {
            $ancienTexteNet = $this->nettoyerTexte($reclamation->getDescription());
            similar_text($nouveauTexteNet, $ancienTexteNet, $pourcentage);
            
            if ($pourcentage > $similariteMax) {
                $similariteMax = $pourcentage;
                $doublonId = $reclamation->getId();
            }
        }
        
        $estDoublon = $similariteMax > 70;
        
        return [
            'est_doublon' => $estDoublon,
            'similarite' => round($similariteMax, 2),
            'doublon_id' => $doublonId,
            'message' => $estDoublon ? '⚠️ Cette réclamation ressemble à une précédente (#' . $doublonId . '). Similarité: ' . round($similariteMax, 2) . '%' : null
        ];
    }

    private function nettoyerTexte(string $texte): string
    {
        $texte = strtolower($texte);
        $texte = preg_replace('/[^\p{L}\p{N}\s]/u', '', $texte);
        $texte = preg_replace('/\s+/', ' ', $texte);
        return trim($texte);
    }
}