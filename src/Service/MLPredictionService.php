<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Psr\Log\LoggerInterface;

class MLPredictionService
{
    private HttpClientInterface $httpClient;
    private LoggerInterface $logger;
    private string $mlApiUrl;

    public function __construct(
        HttpClientInterface $httpClient,
        LoggerInterface $logger,
        string $mlApiUrl
    ) {
        $this->httpClient = $httpClient;
        $this->logger = $logger;
        $this->mlApiUrl = $mlApiUrl;
    }

    public function predict(string $description, ?string $clientId = null, ?string $commandeId = null): array
    {
        try {
            $response = $this->httpClient->request('POST', $this->mlApiUrl . '/predict', [
                'json' => [
                    'description' => $description,
                    'client_id' => $clientId,
                    'commande_id' => $commandeId
                ],
                'timeout' => 10,
            ]);

            $data = $response->toArray();
            
            $this->logger->info('Prédiction ML réussie', [
                'categorie' => $data['categorie'],
                'priorite' => $data['priorite'],
                'confiance' => $data['confiance_categorie']
            ]);
            
            return $data;
            
        } catch (\Exception $e) {
            $this->logger->error('Erreur appel API ML: ' . $e->getMessage());
            
            // Fallback local
            return $this->localFallbackPrediction($description);
        }
    }

    private function localFallbackPrediction(string $description): array
    {
        $descriptionLower = strtolower($description);
        
        // Détection par mots-clés
        if (strpos($descriptionLower, 'colis') !== false || strpos($descriptionLower, 'livraison') !== false) {
            return [
                'success' => true,
                'categorie' => 'livraison',
                'priorite' => 'haute',
                'sentiment' => 'negatif',
                'confiance_categorie' => 0.75,
                'confiance_priorite' => 0.70,
                'confiance_sentiment' => 0.65,
                'reponse_suggerée' => "Bonjour,\n\nJe comprends votre frustration concernant la livraison. Notre service logistique va immédiatement localiser votre colis. Vous recevrez une mise à jour sous 24h.\n\nCordialement,\nL'équipe support",
                'a_reviser' => false
            ];
        }
        
        if (strpos($descriptionLower, 'facture') !== false || strpos($descriptionLower, 'paiement') !== false) {
            return [
                'success' => true,
                'categorie' => 'facturation',
                'priorite' => 'moyenne',
                'sentiment' => 'negatif',
                'confiance_categorie' => 0.70,
                'confiance_priorite' => 0.65,
                'confiance_sentiment' => 0.60,
                'reponse_suggerée' => "Bonjour,\n\nJe suis désolé pour cette erreur de facturation. Je vais vérifier votre dossier et corriger le problème. Pouvez-vous me confirmer votre numéro de commande ?\n\nCordialement,\nL'équipe financière",
                'a_reviser' => false
            ];
        }
        
        // Réponse par défaut
        return [
            'success' => true,
            'categorie' => 'autre',
            'priorite' => 'basse',
            'sentiment' => 'neutre',
            'confiance_categorie' => 0.50,
            'confiance_priorite' => 0.50,
            'confiance_sentiment' => 0.50,
            'reponse_suggerée' => "Bonjour,\n\nMerci pour votre message. J'ai bien pris connaissance de votre réclamation.\n\nNotre équipe va étudier votre demande et reviendra vers vous dans les plus brefs délais.\n\nCordialement,\nL'équipe support client",
            'a_reviser' => true
        ];
    }
}