<?php

namespace App\Service;

use Twilio\Rest\Client;

class TwilioService
{
    private Client $client;
    private string $from;

    public function __construct(string $sid, string $token, string $from)
    {
        $this->client = new Client($sid, $token);
        $this->from = $from;
    }

    public function sendSms(string $to, string $message): void
    {
        try {
            $this->client->messages->create($to, [
                'from' => $this->from,
                'body' => $message
            ]);
        } catch (\Exception $e) {
            error_log($e->getMessage());
        }
    }
}