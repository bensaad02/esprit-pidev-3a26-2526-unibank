<?php
// src/Service/AutoReplyService.php
namespace App\Service;

use Psr\Log\LoggerInterface;

class AutoReplyService
{
    private LoggerInterface $logger;
    private string $apiKey;

    public function __construct(string $openRouterKey, LoggerInterface $logger)
    {
        $this->apiKey = $openRouterKey;
        $this->logger = $logger;
    }

    public function suggererReponse(string $description, string $type, string $sentiment): string
    {
        $this->logger->info('=== OPENROUTER API - GÉNÉRATION RÉPONSE ===');
        
        if (empty($this->apiKey)) {
            return $this->getFallbackResponse($type, $sentiment);
        }
        
        $prompt = $this->construirePrompt($description, $type, $sentiment);
        
        try {
            $ch = curl_init('https://openrouter.ai/api/v1/chat/completions');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer ' . $this->apiKey,
                'Content-Type: application/json',
            ]);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
                'model' => 'mistralai/mistral-7b-instruct:free', // Modèle gratuit
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'Tu es un conseiller bancaire professionnel chez UniBank+. Réponds de manière courtoise et professionnelle en 2-3 phrases maximum.'
                    ],
                    [
                        'role' => 'user',
                        'content' => $prompt
                    ]
                ],
                'max_tokens' => 200,
                'temperature' => 0.7
            ]));
            
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            
            if ($httpCode === 200) {
                $result = json_decode($response, true);
                if (isset($result['choices'][0]['message']['content'])) {
                    return trim($result['choices'][0]['message']['content']);
                }
            }
            
            return $this->getFallbackResponse($type, $sentiment);
            
        } catch (\Exception $e) {
            $this->logger->error('Erreur API: ' . $e->getMessage());
            return $this->getFallbackResponse($type, $sentiment);
        }
    }

    private function construirePrompt(string $description, string $type, string $sentiment): string
    {
        $types = [
            'technique' => 'problème technique',
            'compte' => 'problème de compte bancaire',
            'transaction' => 'problème de transaction',
            'carte' => 'problème de carte bancaire',
            'credit' => 'problème de crédit',
            'autre' => 'réclamation'
        ];
        
        $typeTexte = $types[$type] ?? $types['autre'];
        
        $prompt = "Type de réclamation: {$typeTexte}\n";
        $prompt .= "Message du client: {$description}\n";
        
        if ($sentiment === 'negatif') {
            $prompt .= "Le client est très insatisfait. Présente des excuses et rassure-le.\n";
        }
        
        $prompt .= "\nRédige une réponse professionnelle et empathique:";
        
        return $prompt;
    }

    private function getFallbackResponse(string $type, string $sentiment): string
    {
        $responses = [
            'technique' => "Nous avons bien pris en compte votre problème technique. Notre équipe technique va analyser le dysfonctionnement et revient vers vous sous 48h.",
            'carte' => "Nous avons bien reçu votre signalement concernant votre carte bancaire. Nous allons immédiatement prendre les mesures nécessaires.",
            'transaction' => "Nous accusons réception de votre réclamation concernant la transaction. Nous allons procéder à une enquête interne.",
            'compte' => "Nous comprenons votre préoccupation concernant votre compte bancaire. Un conseiller va étudier votre dossier.",
            'credit' => "Votre demande relative au crédit a été transmise au service concerné.",
            'autre' => "Nous accusons réception de votre réclamation. Notre équipe va l'étudier."
        ];
        
        $response = $responses[$type] ?? $responses['autre'];
        
        if ($sentiment === 'negatif') {
            $response .= " Nous sommes désolés pour la gêne occasionnée.";
        }
        
        return $response;
    }
}