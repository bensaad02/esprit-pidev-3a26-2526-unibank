<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class ExchangeService
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function convert(string $from, string $to, float $amount): float
    {
        $response = $this->client->request(
            'GET',
            "https://api.exchangerate-api.com/v4/latest/$from"
        );

        $data = $response->toArray();

        return $amount * $data['rates'][$to];
    }
}