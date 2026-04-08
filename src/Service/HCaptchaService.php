<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class HCaptchaService
{
    private string $secretKey;
    private string $siteKey;

    public function __construct(
        private HttpClientInterface $httpClient,
        string $hcaptchaSecretKey,
        string $hcaptchaSiteKey,
    ) {
        $this->secretKey = $hcaptchaSecretKey;
        $this->siteKey = $hcaptchaSiteKey;
    }

    public function verify(string $token): bool
    {
        if (empty($token)) {
            return false;
        }

        $response = $this->httpClient->request('POST', 'https://api.hcaptcha.com/siteverify', [
            'body' => [
                'response' => $token,
                'secret' => $this->secretKey,
            ],
        ]);

        $data = $response->toArray(false);

        return isset($data['success']) && $data['success'] === true;
    }

    public function getSiteKey(): string
    {
        return $this->siteKey;
    }
}
