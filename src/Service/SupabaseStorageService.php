<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class SupabaseStorageService
{
    private const SUPABASE_URL    = 'https://hzrukulcbqlxrmdzgyiu.supabase.co';
    private const SUPABASE_KEY    = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Imh6cnVrdWxjYnFseHJtZHpneWl1Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3NzA5MTI4NjUsImV4cCI6MjA4NjQ4ODg2NX0.ex-ENGuCn9hOL7gs91QrnH_dohjQJzTOTZ54BGiPyhk';
    private const BUCKET          = 'unibank+';

    public function __construct(private HttpClientInterface $httpClient)
    {
    }

    /**
     * Upload raw bytes to Supabase Storage.
     *
     * @param string $path      Path inside the bucket, e.g. "contracts/Contrat_123.pdf"
     * @param string $bytes     Raw file content
     * @param string $mimeType  MIME type, default application/pdf
     * @return string|null      Public URL on success, null on failure
     */
    public function upload(string $path, string $bytes, string $mimeType = 'application/pdf'): ?string
    {
        $url = self::SUPABASE_URL . '/storage/v1/object/' . self::BUCKET . '/' . $path;

        try {
            $response = $this->httpClient->request('POST', $url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . self::SUPABASE_KEY,
                    'apikey'        => self::SUPABASE_KEY,
                    'Content-Type'  => $mimeType,
                    'x-upsert'      => 'true',
                ],
                'body'    => $bytes,
                'timeout' => 30,
            ]);

            $status = $response->getStatusCode();
            if ($status >= 200 && $status < 300) {
                return self::SUPABASE_URL . '/storage/v1/object/public/' . self::BUCKET . '/' . $path;
            }
        } catch (\Throwable) {
        }

        return null;
    }

    /**
     * Generate a unique file path for a PDF.
     */
    public function makePath(string $folder, string $prefix, ?string $suffix = null): string
    {
        $ts = date('Ymd_His');
        $suffix = $suffix ? '_' . $suffix : '';
        return $folder . '/' . $prefix . $suffix . '_' . $ts . '.pdf';
    }
}
