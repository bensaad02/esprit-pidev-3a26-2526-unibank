<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class NewsService
{
    private const HEADLINES_URL = 'https://gnews.io/api/v4/top-headlines';
    private const SEARCH_URL    = 'https://gnews.io/api/v4/search';

    public function __construct(
        private HttpClientInterface $httpClient,
        private CacheInterface $cache,
        private string $gnewsApiKey,
    ) {
    }

    public function getFinancialNews(int $max = 8): array
    {
        return $this->cache->get('gnews_financial_' . $max, function (ItemInterface $item) use ($max) {
            $item->expiresAfter(900); // 15 minutes

            try {
                $response = $this->httpClient->request('GET', self::HEADLINES_URL, [
                    'query' => [
                        'topic'  => 'business',
                        'lang'   => 'fr',
                        'max'    => $max,
                        'apikey' => $this->gnewsApiKey,
                    ],
                    'timeout' => 10,
                ]);

                $data = $response->toArray();
                return $data['articles'] ?? [];
            } catch (\Exception $e) {
                return [];
            }
        });
    }

    public function searchNews(string $query, int $max = 6): array
    {
        try {
            $response = $this->httpClient->request('GET', self::SEARCH_URL, [
                'query' => [
                    'q'      => $query,
                    'lang'   => 'fr',
                    'max'    => $max,
                    'apikey' => $this->gnewsApiKey,
                ],
                'timeout' => 10,
            ]);

            $data = $response->toArray();
            return $data['articles'] ?? [];
        } catch (\Exception $e) {
            return [];
        }
    }
}
