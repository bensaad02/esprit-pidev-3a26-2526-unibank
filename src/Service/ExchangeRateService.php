<?php

namespace App\Service;

use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ExchangeRateService
{
    // Currencies to expose (lowercase keys from the API)
    private const CURRENCIES = ['eur', 'usd', 'gbp', 'sar', 'mad'];

    public function __construct(
        private HttpClientInterface $http,
        private CacheInterface $cache,
    ) {}

    // Returns rates: 1 TND → EUR/USD/GBP/SAR/MAD, cached 1 hour
    // Uses https://github.com/fawazahmed0/exchange-api — free, no key, supports TND
    public function getRates(): array
    {
        return $this->cache->get('exchange_rates_tnd_v2', function (ItemInterface $item) {
            $item->expiresAfter(3600);
            try {
                // Primary CDN endpoint — updated daily
                $response = $this->http->request(
                    'GET',
                    'https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies/tnd.json',
                    ['timeout' => 5]
                );
                $data = $response->toArray();
                $raw  = $data['tnd'] ?? [];

                if (empty($raw)) {
                    throw new \RuntimeException('Empty response');
                }

                $rates = [];
                foreach (self::CURRENCIES as $cur) {
                    if (isset($raw[$cur])) {
                        $rates[strtoupper($cur)] = (float) $raw[$cur];
                    }
                }
                return $rates ?: $this->fallback();
            } catch (\Throwable) {
                // Fallback endpoint
                try {
                    $response = $this->http->request(
                        'GET',
                        'https://latest.currency-api.pages.dev/v1/currencies/tnd.json',
                        ['timeout' => 5]
                    );
                    $data = $response->toArray();
                    $raw  = $data['tnd'] ?? [];
                    $rates = [];
                    foreach (self::CURRENCIES as $cur) {
                        if (isset($raw[$cur])) {
                            $rates[strtoupper($cur)] = (float) $raw[$cur];
                        }
                    }
                    return $rates ?: $this->fallback();
                } catch (\Throwable) {
                    return $this->fallback();
                }
            }
        });
    }

    // Convert a TND amount into all tracked currencies
    public function convert(float $tnd): array
    {
        $result = [];
        foreach ($this->getRates() as $currency => $rate) {
            $result[$currency] = round($tnd * $rate, 2);
        }
        return $result;
    }

    // Last-resort fallback (approximate values used only if both endpoints fail)
    private function fallback(): array
    {
        return [
            'EUR' => 0.2934,
            'USD' => 0.3198,
            'GBP' => 0.2521,
            'SAR' => 1.1992,
            'MAD' => 3.1876,
        ];
    }
}
