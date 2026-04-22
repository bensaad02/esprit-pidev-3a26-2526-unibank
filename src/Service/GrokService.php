<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class GrokService
{
    private const API_URL = 'https://api.groq.com/openai/v1/chat/completions';
    private const MODEL   = 'llama-3.3-70b-versatile';

    public function __construct(
        private HttpClientInterface $httpClient,
        private string $groqApiKey,
    ) {
    }

    public function generateReport(string $prompt): string
    {
        try {
            $response = $this->httpClient->request('POST', self::API_URL, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->groqApiKey,
                    'Content-Type'  => 'application/json',
                ],
                'json' => [
                    'model' => self::MODEL,
                    'messages' => [
                        [
                            'role'    => 'system',
                            'content' => 'Tu es un analyste bancaire expert. Tu generes des rapports professionnels en francais sur les donnees bancaires. Sois concis, precis et utilise des bullet points. Ne depasse pas 400 mots.',
                        ],
                        [
                            'role'    => 'user',
                            'content' => $prompt,
                        ],
                    ],
                    'temperature' => 0.7,
                    'max_tokens'  => 1000,
                ],
                'timeout' => 30,
            ]);

            $data = $response->toArray();
            return $data['choices'][0]['message']['content'] ?? 'Impossible de generer le rapport.';
        } catch (\Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface $e) {
            $body = '';
            try { $body = $e->getResponse()->getContent(false); } catch (\Throwable) {}
            $decoded = json_decode($body, true);
            $msg = $decoded['error']['message'] ?? $body;
            return 'Erreur API Groq: ' . $msg;
        } catch (\Exception $e) {
            return 'Erreur: ' . $e->getMessage();
        }
    }

    public function generateDashboardReport(array $stats): string
    {
        $prompt = "Genere un rapport d'analyse bancaire professionnel base sur ces statistiques:\n\n";
        $prompt .= "- Utilisateurs total: {$stats['total_users']}\n";
        $prompt .= "- Comptes actifs: {$stats['active_accounts']}\n";
        $prompt .= "- Credits en cours: {$stats['active_credits']}\n";
        $prompt .= "- Transactions ce mois: {$stats['monthly_transactions']}\n";
        $prompt .= "- Reclamations en attente: {$stats['pending_reclamations']}\n";
        $prompt .= "- Volume transactions (TND): {$stats['transaction_volume']}\n\n";
        $prompt .= "Inclus: resume executif, points cles, risques identifies, et recommandations.";

        return $this->generateReport($prompt);
    }
}
