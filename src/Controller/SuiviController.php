<?php

namespace App\Controller;

use App\Repository\ReclamationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SuiviController extends AbstractController
{
    #[Route('/suivi/{slug}', name: 'app_suivi_reclamation')]
    public function index(string $slug, ReclamationRepository $repo): Response
    {
        // Extraire l'ID du slug (format: "24-probleme-application")
        $parts = explode('-', $slug);
        $id = (int) $parts[0];
        
        $reclamation = $repo->find($id);
        
        if (!$reclamation) {
            throw $this->createNotFoundException('Réclamation non trouvée ou lien invalide.');
        }
        
        // Générer l'URL de suivi
        $suiviUrl = $this->generateUrl('app_suivi_reclamation', ['slug' => $slug], 0);
        
        // QR code
        $qrCodeUrl = "https://quickchart.io/qr?text=" . urlencode($suiviUrl) . "&size=200";
        
        return $this->render('suivi/index.html.twig', [
            'reclamation' => $reclamation,
            'suiviUrl' => $suiviUrl,
            'qrCodeUrl' => $qrCodeUrl
        ]);
    }
}