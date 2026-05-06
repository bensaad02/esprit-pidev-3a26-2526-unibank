<?php
// src/Service/SentimentAnalysisService.php
namespace App\Service;

use Psr\Log\LoggerInterface;
use GuzzleHttp\Client;

class SentimentAnalysisService
{
    private Client $httpClient;
    private string $apiToken;
    private LoggerInterface $logger;

    // ✅ NOUVELLE URL CORRECTE
    private const API_URL = 'https://router.huggingface.co/hf-inference/models/';
    private const MODEL = 'cardiffnlp/twitter-xlm-roberta-base-sentiment';

    public function __construct(string $huggingFaceToken, LoggerInterface $logger)
    {
        $this->apiToken = $huggingFaceToken;
        $this->logger = $logger;
        $this->httpClient = new Client([
            'timeout' => 60,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiToken,
                'Content-Type' => 'application/json',
            ]
        ]);
    }

    public function analyserSentiment(string $texte): array
    {
        $this->logger->info('=== API HUGGING FACE - ANALYSE SENTIMENT ===');
        $this->logger->info('Texte: ' . substr($texte, 0, 200));

        if (empty($this->apiToken)) {
            return ['sentiment' => 'neutre', 'estInsatisfait' => false];
        }

        try {
            $response = $this->httpClient->post(self::API_URL . self::MODEL, [
                'json' => [
                    'inputs' => $texte,
                    'parameters' => ['return_all_scores' => true]
                ]
            ]);

            $result = json_decode($response->getBody(), true);
            $this->logger->info('Résultat API: ' . json_encode($result));

            if (isset($result[0])) {
                foreach ($result[0] as $item) {
                    if ($item['label'] === 'negative' && $item['score'] > 0.6) {
                        return [
                            'sentiment' => 'negatif',
                            'score' => $item['score'],
                            'estInsatisfait' => true
                        ];
                    }
                    if ($item['label'] === 'positive' && $item['score'] > 0.6) {
                        return [
                            'sentiment' => 'positif',
                            'score' => $item['score'],
                            'estInsatisfait' => false
                        ];
                    }
                }
            }

            return ['sentiment' => 'neutre', 'estInsatisfait' => false];

        } catch (\Exception $e) {
            $this->logger->error('Erreur API: ' . $e->getMessage());
            return ['sentiment' => 'neutre', 'estInsatisfait' => false];
        }
    }
}