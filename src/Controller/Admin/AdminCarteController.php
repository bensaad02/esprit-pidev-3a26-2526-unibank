<?php

namespace App\Controller\Admin;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Entity\Carte;
use App\Repository\CarteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\CarteSecurity;
class AdminCarteController extends AbstractController
{
#[Route('/admin/cartes', name: 'admin_cartes')]
public function index(Request $request, CarteRepository $repo): Response
{
    $search = $request->query->get('search');
    $sort = $request->query->get('sort', 'id');
    $direction = $request->query->get('direction', 'DESC');

    $qb = $repo->createQueryBuilder('c');

    // 🔍 SEARCH
    if ($search) {
        $qb->andWhere('c.nom LIKE :s OR c.prenom LIKE :s OR c.typeCarte LIKE :s')
           ->setParameter('s', "%$search%");
    }

    // 🔽 SORT
    $qb->orderBy('c.' . $sort, $direction);

    $cartes = $qb->getQuery()->getResult();

    return $this->render('admin/cartes/index.html.twig', [
        'cartes' => $cartes,
        'search' => $search
    ]);
}
   /* #[Route('/admin/cartes/valider/{id}', name: 'admin_carte_valider')]
    public function valider(Carte $carte, EntityManagerInterface $em): Response
    {
        // 🔥 generate card number if not exists
        if (!$carte->getCardNumber()) {
            $carte->setCardNumber($this->generateCardNumber());
        }

        // 🔥 activate card
        $carte->setStatus('ACTIVE');

        $em->flush();

        $this->addFlash('success', 'Carte validée et livrée 💳');

        return $this->redirectToRoute('admin_cartes');
    }
*/
    #[Route('/admin/cartes/refuser/{id}', name: 'admin_carte_refuser')]
public function refuser(Carte $carte, EntityManagerInterface $em): Response
{
    $carte->setStatus('REFUSE');
    $em->flush();

    $this->addFlash('error', 'Carte refusée ❌');

    return $this->redirectToRoute('admin_cartes');
}
    #[Route('/admin/cartes/block/{id}', name: 'admin_carte_block')]
public function block(Carte $carte, EntityManagerInterface $em): Response
{
    $carte->setStatus('BLOCKED');
    $em->flush();

    $this->addFlash('warning', 'Carte bloquée 🔒');

    return $this->redirectToRoute('admin_cartes');
}

#[Route('/admin/cartes/unblock/{id}', name: 'admin_carte_unblock')]
public function unblock(Carte $carte, EntityManagerInterface $em): Response
{
    $carte->setStatus('ACTIVE');
    $em->flush();

    $this->addFlash('success', 'Carte débloquée 🔓');

    return $this->redirectToRoute('admin_cartes');
}


#[Route('/admin/cartes/pdf', name: 'admin_cartes_pdf')]
public function exportPdf(\App\Repository\CarteRepository $repo): \Symfony\Component\HttpFoundation\Response
{
    $cartes = $repo->findAll();

    // Generate HTML from Twig
    $html = $this->renderView('admin/cartes/pdf.html.twig', [
        'cartes' => $cartes
    ]);

    // Dompdf
    $dompdf = new \Dompdf\Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    // Return PDF
    return new \Symfony\Component\HttpFoundation\Response(
        $dompdf->output(),
        200,
        [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="cartes.pdf"'
        ]
    );
    
}

#[Route('/admin/cartes/valider/{id}', name: 'admin_carte_valider')]
public function valider(Carte $carte, EntityManagerInterface $em): Response
{
    // generate card number
    if (!$carte->getCardNumber()) {
        $carte->setCardNumber($this->generateCardNumber());
    }
    if (!$carte->getExpirationDate()) {
    $expiration = (new \DateTime())->modify('+3 years');
    $carte->setExpirationDate($expiration->format('m/y'));
}

    // 🔐 security
    $security = new CarteSecurity();
    $security->setCarte($carte);
    $security->setPin(rand(1000, 9999));
    $security->setCvv(rand(100, 999));

    $carte->setSecurity($security);

    // activate
    $carte->setStatus('ACTIVE');

    $em->persist($security);
    $em->flush();

    // 🔥 SHOW INFO TEMPORARILY
    $this->addFlash('success', 
        'Carte validée 💳 | PIN: '.$security->getPin().' | CVV: '.$security->getCvv()
    );

    return $this->redirectToRoute('admin_cartes');
}
private function generateCardNumber(): string
{
    $number = '';

    for ($i = 0; $i < 16; $i++) {
        $number .= random_int(0, 9);
    }

    return $number;
}
}