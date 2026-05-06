<?php
// src/Service/ImageModerationService.php
namespace App\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Psr\Log\LoggerInterface;
use GuzzleHttp\Client;

class ImageModerationService
{
    private Client $httpClient;
    private string $apiKey;
    private LoggerInterface $logger;

    public function __construct(string $ocrSpaceApiKey, LoggerInterface $logger)
    {
        $this->apiKey = $ocrSpaceApiKey;
        $this->logger = $logger;
        $this->httpClient = new Client([
            'timeout' => 60,
        ]);
    }

    public function verifierImage(UploadedFile $file): array
    {
        $this->logger->info('=== ANALYSE OCR.SPACE ===');
        $this->logger->info('Fichier: ' . $file->getClientOriginalName());

        // 1. Vérifications basiques
        if ($file->getSize() > 5 * 1024 * 1024) {
            return [
                'is_appropriate' => false,
                'message' => '❌ Fichier trop volumineux (max 5MB)'
            ];
        }

        $allowedMimes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
        if (!in_array($file->getMimeType(), $allowedMimes)) {
            return [
                'is_appropriate' => false,
                'message' => '❌ Format non supporté. Utilisez JPG, PNG ou GIF.'
            ];
        }

        // 2. Vérifier la clé API
        if (empty($this->apiKey) || $this->apiKey === 'K88447963988957
') {
            $this->logger->error('Clé API OCR.Space non configurée');
            return [
                'is_appropriate' => false,
                'message' => '❌ Service de vérification non configuré. Veuillez contacter l\'administrateur.'
            ];
        }

        try {
            // 3. Envoyer l'image à OCR.Space
            $multipart = [
                [
                    'name' => 'apikey',
                    'contents' => $this->apiKey
                ],
                [
                    'name' => 'language',
                    'contents' => 'fre'
                ],
                [
                    'name' => 'isOverlayRequired',
                    'contents' => 'false'
                ],
                [
                    'name' => 'file',
                    'contents' => fopen($file->getPathname(), 'r'),
                    'filename' => $file->getClientOriginalName()
                ]
            ];

            $response = $this->httpClient->post('https://api.ocr.space/parse/image', [
                'multipart' => $multipart
            ]);

            $result = json_decode($response->getBody(), true);
            
            $this->logger->info('Statut OCR: ' . ($result['IsErroredOnProcessing'] ? 'Erreur' : 'Succès'));

            // 4. Extraire le texte
            $texte = '';
            if (!$result['IsErroredOnProcessing'] && isset($result['ParsedResults'][0]['ParsedText'])) {
                $texte = $result['ParsedResults'][0]['ParsedText'];
            }

            $this->logger->info('Texte extrait: ' . substr($texte, 0, 500));

            // 5. Vérifier si c'est un document financier
            $estFinancier = $this->estDocumentFinancier($texte);

            if (!$estFinancier) {
                return [
                    'is_appropriate' => false,
                    'message' => '❌ Seuls les justificatifs financiers sont acceptés. Veuillez joindre une facture, un reçu ou un relevé bancaire.'
                ];
            }

            return [
                'is_appropriate' => true,
                'message' => '✅ Justificatif financier accepté'
            ];

        } catch (\Exception $e) {
            $this->logger->error('Erreur API OCR.Space: ' . $e->getMessage());
            return [
                'is_appropriate' => false,
                'message' => '❌ Service de vérification temporairement indisponible. Veuillez réessayer.'
            ];
        }
    }

    private function estDocumentFinancier(string $texte): bool
    {
        $texte = strtolower($texte);
        
        $financialKeywords = [
            'facture', 'invoice', 'reçu', 'receipt', 'relevé', 'statement',
            'banque', 'bank', 'compte', 'account', 'virement', 'transfert',
            'paiement', 'payment', 'transaction', 'carte', 'card',
            'crédit', 'credit', 'débit', 'debit', 'solde', 'balance',
            'montant', 'amount', 'total', 'euro', '€', '$',
            'client', 'fournisseur', 'tva', 'tax', 'date',
            'rib', 'iban', 'bic', 'swift', 'reference'
        ];
        
        $motsTrouves = [];
        
        foreach ($financialKeywords as $keyword) {
            if (strpos($texte, $keyword) !== false) {
                $motsTrouves[] = $keyword;
            }
        }
        
        $this->logger->info('Mots-clés trouvés: ' . implode(', ', $motsTrouves));
        
        // Vérifier présence d'un montant
        $aMontant = preg_match('/\d+[\s]*[€$]|\d+[\.,]\d{2}/', $texte);
        
        if ($aMontant) {
            $this->logger->info('Montant détecté');
            return true;
        }
        
        return count($motsTrouves) >= 2;
    }
}