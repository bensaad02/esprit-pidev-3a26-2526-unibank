<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class AIService
{
    private const HF_URL              = 'https://router.huggingface.co/hf-inference/models/';
    private const SENTIMENT_MODEL     = 'nlptown/bert-base-multilingual-uncased-sentiment';
    private const TOXICITY_MODEL      = 'unitary/multilingual-toxic-xlm-roberta';

    public function __construct(
        private HttpClientInterface $httpClient,
        private string $huggingfaceToken,
    ) {
    }

    /**
     * Analyze sentiment of text.
     * Returns: 'positif', 'negatif', or 'neutre'
     */
    public function analyzeSentiment(string $text): string
    {
        try {
            $response = $this->httpClient->request('POST', self::HF_URL . self::SENTIMENT_MODEL, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->huggingfaceToken,
                    'Content-Type'  => 'application/json',
                ],
                'json' => [
                    'inputs'     => mb_substr($text, 0, 512),
                    'parameters' => ['top_k' => 3],
                ],
                'timeout' => 15,
            ]);

            $results = $response->toArray();

            if (empty($results) || !is_array($results[0])) {
                return 'neutre';
            }

            $topResult = $results[0][0];
            $label     = strtolower($topResult['label'] ?? '');

            if (str_contains($label, '4 star') || str_contains($label, '5 star')) {
                return 'positif';
            } elseif (str_contains($label, '1 star') || str_contains($label, '2 star')) {
                return 'negatif';
            }
            return 'neutre';
        } catch (\Exception $e) {
            return 'neutre';
        }
    }
    /** Detection frauuud  */


    public function detectFraud(array $transactions): array
{
    $alerts = [];

    $count = count($transactions);
    $typeCounter = [];

    foreach ($transactions as $t) {
        $amount = $t->getMontant();
        $type = $t->getType();

        // 🚨 HIGH AMOUNT
        if ($amount > 500) {
            $alerts[] = "🚨 Montant élevé détecté: $amount DT";
        }

        // count types
        if (!isset($typeCounter[$type])) {
            $typeCounter[$type] = 0;
        }
        $typeCounter[$type]++;
    }

    // 🚨 TOO MANY TRANSACTIONS
    if ($count >= 5) {
        $alerts[] = "🚨 Trop de transactions en peu de temps";
    }

    // 🚨 SAME TYPE SPAM
    foreach ($typeCounter as $type => $c) {
        if ($c >= 5) {
            $alerts[] = "🚨 Activité suspecte répétée: $type";
        }
    }

    return $alerts;
}

    /**
     * Check if text contains toxic content.
     * Returns true if toxic (score > 0.7)
     */
    public function isToxic(string $text): bool
    {
        try {
            $response = $this->httpClient->request('POST', self::HF_URL . self::TOXICITY_MODEL, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->huggingfaceToken,
                    'Content-Type'  => 'application/json',
                ],
                'json' => [
                    'inputs' => mb_substr($text, 0, 512),
                ],
                'timeout' => 15,
            ]);

            $results = $response->toArray();

            if (empty($results) || !is_array($results[0])) {
                return false;
            }

            foreach ($results[0] as $result) {
                $label = strtolower($result['label'] ?? '');
                $score = (float) ($result['score'] ?? 0);
                if ($label === 'toxic' && $score > 0.7) {
                    return true;
                }
            }
            return false;
        } catch (\Exception $e) {
            return false;
        }
    }
}
