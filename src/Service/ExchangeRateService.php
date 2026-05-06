<?php

namespace App\Service;

use Symfony\Contracts\Cache\CacheInterface; // service de cache pour stocker les taux temporairement
use Symfony\Contracts\Cache\ItemInterface; // represente un element de cache
use Symfony\Contracts\HttpClient\HttpClientInterface; // permet d'appeler des API externes

class ExchangeRateService
{
    // Liste des devises supportees (cles en minuscules provenant de l'API)
    private const CURRENCIES = ['eur', 'usd', 'gbp', 'sar', 'mad'];

    public function __construct(
        private HttpClientInterface $http, // client HTTP pour appeler les API externes
        private CacheInterface $cache, // service de cache pour eviter les appels repetes
    ) {}

    // ------------------------------------------------------------
    // Role : recuperer les taux de change du TND vers d'autres devises
    // Quand utiliser : au chargement des donnees ou simulation de credit
    // Fonctionnement :
    // - Verifie le cache d'abord
    // - Sinon appelle une API externe
    // - Sinon utilise un fallback (valeurs par defaut)
    // ------------------------------------------------------------
    public function getRates(): array
    {
        return $this->cache->get('exchange_rates_tnd_v2', function (ItemInterface $item) {
            // duree de vie du cache : 1 heure
            $item->expiresAfter(3600);

            try {
                // Appel API principale pour recuperer les taux
                $response = $this->http->request(
                    'GET',
                    'https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies/tnd.json',
                    ['timeout' => 5]
                );

                // Conversion de la reponse JSON en tableau PHP
                $data = $response->toArray();

                // Extraction des taux lies au TND
                $raw = $data['tnd'] ?? [];

                // Si aucune donnee n'est retournee
                if (empty($raw)) {
                    throw new \RuntimeException('Reponse API vide');
                }

                $rates = [];

                // Parcours des devises demandees
                foreach (self::CURRENCIES as $cur) {
                    if (isset($raw[$cur])) {
                        // Conversion de la cle en majuscule (EUR, USD...)
                        $rates[strtoupper($cur)] = (float) $raw[$cur];
                    }
                }

                // Retourne les taux ou fallback si vide
                return $rates ?: $this->fallback();
            } catch (\Throwable) {
                // API secondaire en cas d'echec de la premiere API
                try {
                    $response = $this->http->request(
                        'GET',
                        'https://latest.currency-api.pages.dev/v1/currencies/tnd.json',
                        ['timeout' => 5]
                    );

                    // Conversion de la reponse JSON en tableau PHP
                    $data = $response->toArray();

                    // Extraction des taux lies au TND
                    $raw = $data['tnd'] ?? [];

                    $rates = [];

                    // Parcours des devises demandees
                    foreach (self::CURRENCIES as $cur) {
                        if (isset($raw[$cur])) {
                            // Conversion de la cle en majuscule (EUR, USD...)
                            $rates[strtoupper($cur)] = (float) $raw[$cur];
                        }
                    }

                    // Retourne les taux ou fallback si vide
                    return $rates ?: $this->fallback();
                } catch (\Throwable) {
                    // fallback final si toutes les APIs echouent
                    return $this->fallback();
                }
            }
        });
    }

    // ------------------------------------------------------------
    // Role : convertir un montant TND vers plusieurs devises
    // Quand utiliser : affichage simulation ou conversion credit
    // ------------------------------------------------------------
    public function convert(float $tnd): array
    {
        $result = [];

        // Recupere les taux (depuis cache ou API)
        foreach ($this->getRates() as $currency => $rate) {
            // Calcul de conversion
            $result[$currency] = round($tnd * $rate, 2);
        }

        return $result;
    }

    // ------------------------------------------------------------
    // Role : fournir des valeurs de secours (fallback)
    // Quand utiliser : si toutes les APIs echouent
    // ------------------------------------------------------------
    private function fallback(): array
    {
        return [
            'EUR' => 0.2934, // euro
            'USD' => 0.3198, // dollar americain
            'GBP' => 0.2521, // livre sterling
            'SAR' => 1.1992, // riyal saoudien
            'MAD' => 3.1876, // dirham marocain
        ];
    }
}
