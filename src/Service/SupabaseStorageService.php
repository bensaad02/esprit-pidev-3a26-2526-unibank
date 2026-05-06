<?php

namespace App\Service;

// Client HTTP Symfony pour communiquer avec Supabase.
use Symfony\Contracts\HttpClient\HttpClientInterface;

class SupabaseStorageService
{
    // URL principale du projet Supabase.
    private const SUPABASE_URL    = 'https://hzrukulcbqlxrmdzgyiu.supabase.co';
    // Cle API utilisee pour autoriser les requetes vers Supabase.
    private const SUPABASE_KEY    = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Imh6cnVrdWxjYnFseHJtZHpneWl1Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3NzA5MTI4NjUsImV4cCI6MjA4NjQ4ODg2NX0.ex-ENGuCn9hOL7gs91QrnH_dohjQJzTOTZ54BGiPyhk';
    // Nom du bucket ou les fichiers sont stockes.
    private const BUCKET          = 'unibank+';

    // recoit le client HTTP injecte par Symfony.
    public function __construct(private HttpClientInterface $httpClient) {}

    /**
     * Upload raw bytes to Supabase Storage.
     *
     * @param string $path      Path inside the bucket, e.g. "contracts/Contrat_123.pdf"
     * @param string $bytes     Raw file content
     * @param string $mimeType  MIME type, default application/pdf
     * @return string|null      Public URL on success, null on failure
     */
    // Envoie un fichier vers Supabase et retourne son lien public si succes.
    public function upload(string $path, string $bytes, string $mimeType = 'application/pdf'): ?string
    {
        // Construit l'URL complete d'upload dans Supabase Storage.
        $url = self::SUPABASE_URL . '/storage/v1/object/' . self::BUCKET . '/' . $path; // url base sub endpoint storge

        //   vers Supabase.
        try {
            // Envoie une requete conteu(post)
            $response = $this->httpClient->request('POST', $url, [
                // Definit les entetes HTTP 
                'headers' => [
                    // Authentification Bearer avec la cle Supabase.
                    'Authorization' => 'Bearer ' . self::SUPABASE_KEY,
                    // Cle API envoyee aussi dans l'entete apikey.
                    'apikey'        => self::SUPABASE_KEY,
                    // Type MIME du fichier envoye.
                    'Content-Type'  => $mimeType,
                    // Autorise le remplacement du fichier s'il existe deja.
                    'x-upsert'      => 'true',
                ],
                // Contenu du fichier a uploader.
                'body'    => $bytes,
                // Temps maximal attend req
                'timeout' => 30,
            ]);

            // Recupere le code HTTP retourne par Supabase.
            $status = $response->getStatusCode();
            // Si le code est un succes, retourne l'URL 
            if ($status >= 200 && $status < 300) {
                return self::SUPABASE_URL . '/storage/v1/object/public/' . self::BUCKET . '/' . $path;
            }
            // Si une erreur se produit, on la capture ici.
        } catch (\Throwable) {
        }

        // a echoue null
        return null;
    }

    /**
     */
    // Genere un chemin unique pour le nom du fichier PDF.
    public function makePath(string $folder, string $prefix, ?string $suffix = null): string
    {
        // temps tawa 20260421_153045

        $ts = date('Ymd_His');

        $suffix = $suffix ? '_' . $suffix : '';
        // Construit et retourne le chemin final du fichier.
        return $folder . '/' . $prefix . $suffix . '_' . $ts . '.pdf'; //Contrat_ABC123_client1_20260421_153045.pdf

    }
}
