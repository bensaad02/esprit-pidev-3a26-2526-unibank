<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class ChatbotService
{
    public function __construct(
        private HttpClientInterface $httpClient,
        private string $ollamaUrl,
    ) {
    }

    public function chat(string $message, array $history = []): string
    {
        try {
            $response = $this->httpClient->request('POST', $this->ollamaUrl . '/chat', [
                'headers' => ['Content-Type' => 'application/json'],
                'json' => ['message' => $message, 'history' => $history],
                'timeout' => 30,
            ]);

            $data = $response->toArray();
            $text = $data['response'] ?? '';

            if (empty($text) || str_starts_with($text, 'Erreur:') || str_starts_with($text, 'Error:')) {
                return 'Je suis momentanement indisponible. Le service IA est en cours de demarrage, veuillez reessayer dans quelques instants.';
            }

            return $text;
        } catch (\Exception $e) {
            return 'Le service de chat est temporairement indisponible. Veuillez reessayer plus tard.';
        }
    }

    public function isAvailable(): bool
    {
        try {
            $response = $this->httpClient->request('GET', $this->ollamaUrl . '/health', [
                'timeout' => 3,
            ]);
            return $response->getStatusCode() === 200;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getSystemPrompt(): string
    {
        return 'Tu es UniBot, l\'assistant virtuel de UniBank+. Tu aides les clients avec leurs questions bancaires : comptes, transactions, credits, reclamations, et services disponibles. Sois professionnel, concis et utile. Reponds toujours en francais.';
    }
}
