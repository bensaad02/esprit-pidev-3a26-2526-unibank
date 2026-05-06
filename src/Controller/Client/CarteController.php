<?php

namespace App\Controller\Client;



use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

use App\Service\CardHealthService;
use App\Entity\Carte;
use App\Entity\TransactionCarte;
use App\Repository\CarteRepository; // ✅ only once
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\AIService;
use App\Form\CarteType; 
use Symfony\Contracts\HttpClient\HttpClientInterface; 
use App\Repository\CompteRepository;
class CarteController extends AbstractController
{




#[Route('/client/carte/dashboard', name: 'app_carte_dashboard')]
public function carteDashboard(
    ChartBuilderInterface $chartBuilder,
    HttpClientInterface $client,
    EntityManagerInterface $em,
    CardHealthService $healthService,
    AIService $aiService
): Response {

    // =====================
    // 💳 USER CARTES
    // =====================
    $cartes = $em->getRepository(Carte::class)->findBy([
        'utilisateur' => $this->getUser()
    ]);

    // =====================
    // 💳 TRANSACTIONS CARTE (KEEP ORIGINAL WORKING QUERY)
    // =====================
    $transactions = $em->getRepository(TransactionCarte::class)
        ->findBy([], ['date' => 'ASC']); // ✅ SAFE (no join issues)

    // =====================
    // ✅ ADD SCORE (ONLY THIS NEW LINE 🔥)
    // =====================
    $score = $healthService->calculate($transactions);

    // =====================
    // 📊 DATA (UNCHANGED LOGIC)
    // =====================
    $dates = [];
    $amounts = [];

    $types = [
        'PAIEMENT' => 0,
        'RECHARGE' => 0,
        'FACTURE' => 0
    ];

    foreach ($transactions as $t) {

        $dates[] = $t->getDate()?->format('d/m') ?? 'X';
        $amounts[] = $t->getMontant();

        $type = strtoupper($t->getType());

        if (isset($types[$type])) {
            $types[$type] += $t->getMontant();
        }
    }

    // =====================
    // 📈 TRANSACTION CHART
    // =====================
    $transactionChart = $chartBuilder->createChart(Chart::TYPE_LINE);

    $transactionChart->setData([
        'labels' => $dates,
        'datasets' => [[
            'label' => 'Transactions Carte',
            'data' => $amounts,
            'borderColor' => '#4f46e5',
            'backgroundColor' => 'rgba(79,70,229,0.2)',
            'fill' => true,
            'tension' => 0.4,
        ]]
    ]);

    // =====================
    // 🪙 CRYPTO (UNCHANGED)
    // =====================
    $cryptoNames = [];
    $cryptoPrices = [];

    try {
        $response = $client->request('GET', 'https://api.coingecko.com/api/v3/coins/markets', [
            'query' => [
                'vs_currency' => 'usd',
                'per_page' => 5,
            ],
        ]);

        $data = $response->toArray();

        foreach ($data as $coin) {
            $cryptoNames[] = $coin['name'];
            $cryptoPrices[] = $coin['current_price'];
        }

    } catch (\Exception $e) {}

    $cryptoChart = $chartBuilder->createChart(Chart::TYPE_BAR);

    $cryptoChart->setData([
        'labels' => $cryptoNames,
        'datasets' => [[
            'label' => 'Crypto Market',
            'data' => $cryptoPrices,
            'backgroundColor' => '#f59e0b',
        ]]
    ]);

    // =====================
    // 🧠 CATEGORY CHART
    // =====================
    $categoryChart = $chartBuilder->createChart(Chart::TYPE_DOUGHNUT);

    $categoryChart->setData([
        'labels' => array_keys($types),
        'datasets' => [[
            'data' => array_values($types),
            'backgroundColor' => [
                '#4f46e5',
                '#16a34a',
                '#ea580c'
            ],
        ]]
    ]);
// =====================
// 🤖 BUILD TEXT FROM TRANSACTIONS
// =====================
$text = '';

foreach ($transactions as $t) {
    $text .= $t->getType() . ' ' . $t->getMontant() . ' DT, ';
}
$sentiment = $aiService->analyzeSentiment($text);
$isToxic = $aiService->isToxic($text);
$insights = [];

if ($sentiment === 'positif') {
    $insights[] = "Your spending behavior looks healthy ✅";
} elseif ($sentiment === 'negatif') {
    $insights[] = "Your spending pattern may be risky ⚠️";
} else {
    $insights[] = "Your activity is neutral 📊";
}

if ($isToxic) {
    $insights[] = "⚠️ Unusual or suspicious activity detected";
}

// classic insight (keep it)
$total = array_sum(array_map(fn($t) => $t->getMontant(), $transactions));

if ($total > 1000) {
    $insights[] = "High spending detected 💸";
}
    return $this->render('client/cartes/carte_dashboard.html.twig', [
        'cartes' => $cartes,
        'transactionChart' => $transactionChart,
        'cryptoChart' => $cryptoChart,
        'categoryChart' => $categoryChart,
        'score' => $score ,'insights' => $insights,
    ]);
}



#[Route('/carte/payer/{id}', name: 'carte_payer')]
public function payer(
    int $id,
    Request $request,
    EntityManagerInterface $em,
    \App\Repository\CarteRepository $carteRepo
): Response {

    // 🔥 FETCH FROM DB
    $carte = $carteRepo->find($id);

    // ❌ if not found
    if (!$carte) {
        throw $this->createNotFoundException('Carte introuvable ❌');
    }

    // 🔐 SECURITY: ensure this card belongs to logged user
    if ($carte->getUtilisateur() !== $this->getUser()) {
        throw $this->createAccessDeniedException('Accès refusé ❌');
    }

    if ($request->isMethod('POST')) {

        $amount = (float)$request->request->get('amount');
        $pin = $request->request->get('pin');
        $type = $request->request->get('type');

        // DEBUG (you can remove later)
        // dd($carte->getId());

        // ❌ invalid amount
        if ($amount <= 0) {
            $this->addFlash('error', 'Montant invalide ❌');
            return $this->redirectToRoute('carte_payer', ['id' => $id]);
        }

        $security = $carte->getSecurity();

        // 🔐 PIN check
        if (!$security || $pin != $security->getPin()) {
            $this->addFlash('error', 'PIN incorrect ❌');
            return $this->redirectToRoute('carte_payer', ['id' => $id]);
        }

        $solde = (float)$carte->getSolde();

        // ❌ insufficient
        if ($solde < $amount) {
            $this->addFlash('error', 'Solde insuffisant ❌');
            return $this->redirectToRoute('carte_payer', ['id' => $id]);
        }

        // 💳 subtract
        $carte->setSolde((string)($solde - $amount));

        // 🚨 CRITICAL CHECK BEFORE SAVE
        if (!$carte->getId()) {
            throw new \Exception('Carte ID is NULL ❌');
        }

        // 📊 TRANSACTION
        $transaction = new TransactionCarte();

$transaction->setCarte($carte);
$transaction->setMontant($amount);
$transaction->setType($type);

// ✅ ADD THIS LINE (VERY IMPORTANT)
$transaction->setDate(new \DateTime());

$em->persist($transaction);
$em->flush();

        $this->addFlash('success', 'Paiement réussi 💸');

        return $this->redirectToRoute('app_client_cartes');
    }

    return $this->render('client/cartes/payer.html.twig', [
        'carte' => $carte
    ]);
}   


#[Route('/carte/{id}/transactions', name: 'carte_transactions')]
public function transactions(
    int $id,
    \App\Repository\CarteRepository $carteRepo,
    \App\Repository\TransactionCarteRepository $transactionRepo
): Response {

    $carte = $carteRepo->find($id);

    if (!$carte) {
        throw $this->createNotFoundException('Carte introuvable ❌');
    }

    // 🔐 security
    if ($carte->getUtilisateur() !== $this->getUser()) {
        throw $this->createAccessDeniedException();
    }

    $transactions = $transactionRepo->findBy(
        ['carte' => $carte],
        ['date' => 'DESC'] // 🔥 latest first
    );

    return $this->render('client/cartes/transactionCarte.html.twig', [
        'carte' => $carte,
        'transactions' => $transactions
    ]);
}

#[Route('/carte/transfer/{id}', name: 'carte_transfer')]
public function transfer(
    Carte $sourceCarte,
    Request $request,
    EntityManagerInterface $em,
    CarteRepository $carteRepo,
    CompteRepository $compteRepo
): Response {

    if ($request->isMethod('POST')) {

        $destNumber = $request->request->get('destination'); // full or last 4
        $amount = (float)$request->request->get('amount');
        $enteredPin = $request->request->get('pin');

        // 🔐 PIN check on source card
        $security = $sourceCarte->getSecurity();
        if (!$security || $enteredPin != $security->getPin()) {
            $this->addFlash('error', 'PIN incorrect ❌');
            return $this->redirectToRoute('carte_transfer', ['id' => $sourceCarte->getId()]);
        }

        // 🔎 Find destination card (simple: by full number or last 4)
        $destCarte = $carteRepo->createQueryBuilder('c')
            ->where('c.cardNumber LIKE :num')
            ->setParameter('num', '%'.$destNumber)
            ->getQuery()
            ->getOneOrNullResult();

        if (!$destCarte) {
            $this->addFlash('error', 'Carte destination introuvable ❌');
            return $this->redirectToRoute('carte_transfer', ['id' => $sourceCarte->getId()]);
        }

        // 💰 Get comptes
        $sourceCompte = $compteRepo->findOneBy(['utilisateur' => $sourceCarte->getUtilisateur()]);
        $destCompte   = $compteRepo->findOneBy(['utilisateur' => $destCarte->getUtilisateur()]);

        if (!$sourceCompte || !$destCompte) {
            $this->addFlash('error', 'Compte introuvable ❌');
            return $this->redirectToRoute('app_client_cartes');
        }

        $sourceSolde = (float)$sourceCompte->getSolde();

        // ❌ insufficient funds
        if ($sourceSolde < $amount) {
            $this->addFlash('error', 'Solde insuffisant ❌');
            return $this->redirectToRoute('carte_transfer', ['id' => $sourceCarte->getId()]);
        }

        // 🔁 TRANSFER
        $sourceCompte->setSolde((string)($sourceSolde - $amount));

        $destSolde = (float)$destCompte->getSolde();
        $destCompte->setSolde((string)($destSolde + $amount));

        // (optional) mirror on cards if you use card balances
        $sourceCarte->setSolde((string)((float)$sourceCarte->getSolde() - $amount));
        $destCarte->setSolde((string)((float)$destCarte->getSolde() + $amount));

        $em->flush();

        $this->addFlash('success', 'Transfert réussi 💸');

        return $this->redirectToRoute('app_client_cartes');
    }

    return $this->render('client/cartes/transfer.html.twig', [
        'carte' => $sourceCarte
    ]);
}
    #[Route('/client/cartes/add', name: 'app_client_cartes_add')]
public function add(
    Request $request,
    EntityManagerInterface $em,
    CompteRepository $compteRepo
): Response
{
    $carte = new Carte();

    $form = $this->createForm(CarteType::class, $carte);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {

        $user = $this->getUser();

        // 👤 assign user
        $carte->setUtilisateur($user);

        // autofill
        $carte->setNom($user->getNom());
        $carte->setPrenom($user->getPrenom());

        $carte->setStatus('EN_ATTENTE');
        $carte->setCardNumber(null);

        // 💰 PRICE
        $price = 0;

        switch ($carte->getTypeCarte()) {
            case 'SILVER':
                $price = 10;
                break;
            case 'GOLD':
                $price = 100;
                break;
            case 'PLATINUM':
                $price = 200;
                break;
        }

        // 🔥 GET USER COMPTE
        $compte = $compteRepo->findOneBy(['utilisateur' => $user]);

        if (!$compte) {
            $this->addFlash('error', 'Aucun compte trouvé ❌');
            return $this->redirectToRoute('app_client_cartes');
        }

        $solde = (float) $compte->getSolde();

        // ❌ insufficient funds
        if ($solde < $price) {
            $this->addFlash('error', 'Solde insuffisant ❌');
            return $this->redirectToRoute('app_client_cartes');
        }

        // ✅ deduct from compte
        $compte->setSolde((string) ($solde - $price));

        $em->persist($carte);
        $em->flush();

        $this->addFlash('success', 'Carte créée + frais déduits 💳');

        return $this->redirectToRoute('app_client_cartes');
    }

    return $this->render('client/cartes/add.html.twig', [
        'form' => $form->createView()
    ]);
}
#[Route('/client/cartes/edit/{id}', name: 'app_client_cartes_edit')]
public function edit(Carte $carte, Request $request, EntityManagerInterface $em): Response
{
    // 🔒 SECURITY FIX
    if ($carte->getUtilisateur() !== $this->getUser()) {
        throw $this->createAccessDeniedException();
    }

    $form = $this->createForm(CarteType::class, $carte);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {

        // 🔥 keep user + names safe
        $carte->setUtilisateur($this->getUser());
        $carte->setNom($this->getUser()->getNom());
        $carte->setPrenom($this->getUser()->getPrenom());

        $em->flush();

        $this->addFlash('success', 'Carte modifiée ✅');

        return $this->redirectToRoute('app_client_cartes');
    }

    return $this->render('client/cartes/edit.html.twig', [
        'form' => $form->createView()
    ]);
}

    #[Route('/client/cartes/pdf', name: 'app_client_cartes_pdf')]
public function exportPdf(CarteRepository $repo): Response
{
    $cartes = $repo->findBy([
        'utilisateur' => $this->getUser()
    ]);

    $html = $this->renderView('client/cartes/pdf.html.twig', [
        'cartes' => $cartes
    ]);

    // ✅ Dompdf setup
    $options = new \Dompdf\Options();
    $options->set('defaultFont', 'Arial');

    $dompdf = new \Dompdf\Dompdf($options);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    // ✅ Output PDF
    $pdfBytes = $dompdf->output();

    return new Response($pdfBytes, 200, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'attachment; filename="mes_cartes.pdf"',
    ]);
}
#[Route('/client/cartes/delete/{id}', name: 'app_client_cartes_delete', methods: ['GET','POST'])]
    public function delete(Carte $carte, EntityManagerInterface $em): Response
    {
        if ($carte->getUtilisateur() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        $em->remove($carte);
        $em->flush();

        return $this->redirectToRoute('app_client_cartes');
    }

    #[Route('/carte/alimenter/{id}', name: 'carte_alimenter')]
public function alimenter(
    Carte $carte,
    Request $request,
    EntityManagerInterface $em,
    CompteRepository $compteRepo
): Response {

    if ($request->isMethod('POST')) {

        $enteredPin = $request->request->get('pin');
        $amount = (float)$request->request->get('amount');

        $security = $carte->getSecurity();

        if (!$security) {
            $this->addFlash('error', 'Erreur sécurité ❌');
            return $this->redirectToRoute('app_client_cartes');
        }

        // 🔐 CHECK PIN
        if ($enteredPin != $security->getPin()) {
            $this->addFlash('error', 'PIN incorrect ❌');
            return $this->redirectToRoute('carte_alimenter', ['id' => $carte->getId()]);
        }

        // 💰 GET USER COMPTE
        $compte = $compteRepo->findOneBy([
            'utilisateur' => $carte->getUtilisateur()
        ]);

        if (!$compte) {
            $this->addFlash('error', 'Compte introuvable ❌');
            return $this->redirectToRoute('app_client_cartes');
        }

        // 💰 ADD MONEY
        $compteSolde = (float)$compte->getSolde();

// ❌ check balance
if ($compteSolde < $amount) {
    $this->addFlash('error', 'Solde insuffisant ❌');
    return $this->redirectToRoute('carte_alimenter', ['id' => $carte->getId()]);
}

// 💰 subtract from compte
$compte->setSolde((string) ($compteSolde - $amount));

// 💳 add to carte
$carteSolde = (float)$carte->getSolde();
$carte->setSolde((string) ($carteSolde + $amount));

        $em->flush();

        $this->addFlash('success', 'Recharge réussie 💰');

        return $this->redirectToRoute('app_client_cartes');
    }

    return $this->render('client/cartes/alimenter.html.twig', [
        'carte' => $carte
    ]);
}
    #[Route('/carte/convert/{id}', name: 'carte_convert')]
public function convert(
    Carte $carte,
    \App\Service\ExchangeService $exchange
): Response
{
    $amount = (float) $carte->getSolde();

    $eur = $exchange->convert('TND', 'EUR', $amount);
    $usd = $exchange->convert('TND', 'USD', $amount);

    return $this->render('client/cartes/convert.html.twig', [
        'carte' => $carte,
        'eur' => $eur,
        'usd' => $usd
    ]);
}



#[Route('/client/transactionCarte', name: 'client_all_transactions')]
public function allTransactions(Request $request, EntityManagerInterface $em): Response
{
    $type = $request->query->get('type');
    $search = $request->query->get('search');

    $qb = $em->getRepository(\App\Entity\TransactionCarte::class)
        ->createQueryBuilder('t')
        ->orderBy('t.date', 'DESC');

    if ($type) {
        $qb->andWhere('t.type = :type')->setParameter('type', $type);
    }

    if ($search) {
        $qb->andWhere('t.type LIKE :search')->setParameter('search', "%$search%");
    }

    $transactions = $qb->getQuery()->getResult();

    // 💰 total
    $total = 0;
    foreach ($transactions as $t) {
        $total += $t->getMontant();
    }

    return $this->render('client/cartes/all_transactionsCarte.html.twig', [
        'transactions' => $transactions,
        'total' => $total,
        'search' => $search,
        'type' => $type
    ]);
}

#[Route('/client/cartes', name: 'app_client_cartes')]
public function index(
    Request $request,
    EntityManagerInterface $em,
    HttpClientInterface $client
): Response {

    // 🔍 SEARCH
    $search = $request->query->get('search');

    $repo = $em->getRepository(Carte::class);

    if ($search) {
        $cartes = $repo->createQueryBuilder('c')
            ->where('c.nom LIKE :s OR c.prenom LIKE :s')
            ->setParameter('s', "%$search%")
            ->getQuery()
            ->getResult();
    } else {
        $cartes = $repo->findBy([
            'utilisateur' => $this->getUser()
        ]);
    }

    // =========================
    // 🪙 STEP 1: CRYPTO API HERE
    // =========================
    $cryptos = [];

    try {
        $responseCrypto = $client->request('GET', 'https://api.coingecko.com/api/v3/coins/markets', [
            'query' => [
                'vs_currency' => 'usd',
                'order' => 'market_cap_desc',
                'per_page' => 6,
                'page' => 1,
            ],
        ]);

        $cryptos = $responseCrypto->toArray();

    } catch (\Exception $e) {
        $cryptos = [];
    }

    // =========================
    // 📰 NEWS (OPTIONAL)
    // =========================
    $articles = [];

    try {
        $response = $client->request('GET', 'https://gnews.io/api/v4/search', [
            'query' => [
                'q' => 'finance OR crypto',
                'lang' => 'en',
                'max' => 6,
                'token' => $_ENV['GNEWS_API_KEY'],
            ],
        ]);

        $data = $response->toArray();
        $articles = $data['articles'] ?? [];

    } catch (\Exception $e) {
        $articles = [];
    }

    // =========================
    // RETURN
    // =========================
    return $this->render('client/cartes/index.html.twig', [
        'cartes' => $cartes,
        'cryptos' => $cryptos,   // 👈 IMPORTANT
        'articles' => $articles,
        'search' => $search
    ]);
}
#[Route('/client/news', name: 'app_finance_news')]
public function financeNews(HttpClientInterface $client): Response
{
    $articles = [];
    $cryptos = [];

    // 📰 NEWS
    try {
        $response = $client->request('GET', 'https://gnews.io/api/v4/search', [
            'query' => [
                'q' => 'finance OR crypto',
                'lang' => 'en',
                'max' => 6,
                'token' => $_ENV['GNEWS_API_KEY'],
            ],
        ]);

        $data = $response->toArray();
        $articles = $data['articles'] ?? [];

    } catch (\Exception $e) {
        $articles = [];
    }

    // 🪙 CRYPTO
    try {
        $responseCrypto = $client->request('GET', 'https://api.coingecko.com/api/v3/coins/markets', [
            'query' => [
                'vs_currency' => 'usd',
                'order' => 'market_cap_desc',
                'per_page' => 6,
                'page' => 1,
            ],
        ]);

        $cryptos = $responseCrypto->toArray();

    } catch (\Exception $e) {
        $cryptos = [];
    }

    return $this->render('client/cartes/financeNews.html.twig', [
        'articles' => $articles,
        'cryptos' => $cryptos
    ]);
}
/*
    #[Route('/client/cartes', name: 'app_client_cartes')]
    public function index(Request $request, CarteRepository $repo): Response
    {
        $search = $request->query->get('search');

        $qb = $repo->createQueryBuilder('c')
            ->andWhere('c.utilisateur = :user')
            ->setParameter('user', $this->getUser());

        if ($search) {
            $qb->andWhere('c.typeCarte LIKE :s')
               ->setParameter('s', "%$search%");
        }

        $cartes = $qb->getQuery()->getResult();

        return $this->render('client/cartes/index.html.twig', [
            'cartes' => $cartes,
            'search' => $search
        ]);
    }

*/
#[Route('/carte/ai/{id}', name: 'ai_carte')]
public function aiCarte(
    Carte $carte,
    AIService $ai
): Response {

    $transactions = $carte->getTransactions();

    $text = '';
    $total = 0;
    $recharge = 0;
    $internet = 0;

    foreach ($transactions as $t) {
        $type = $t->getType();
        $amount = $t->getMontant();

        $text .= $type . ' ' . $amount . ' DT, ';
        $total += $amount;

        // 🔍 simple stats
        if ($type === 'RECHARGE') {
            $recharge += $amount;
        }
        if ($type === 'INTERNET') {
            $internet += $amount;
        }
    }

    // 🤖 AI sentiment
    $sentiment = $ai->analyzeSentiment($text);

    // 🧠 SIMPLE AI ADVICE (important upgrade)
    $advice = "Activité normale.";

    if ($recharge > 100) {
        $advice = "⚠️ Vous dépensez beaucoup en recharge.";
    } elseif ($internet > 100) {
        $advice = "⚠️ Vos factures internet sont élevées.";
    } elseif ($sentiment === 'negatif') {
        $advice = "⚠️ Vos dépenses semblent élevées.";
    } elseif ($sentiment === 'positif') {
        $advice = "✅ Bonne gestion de vos dépenses.";
    }

    return $this->render('client/cartes/ai_carte.html.twig', [
        'carte' => $carte,
        'sentiment' => $sentiment,
        'total' => $total,
        'transactions' => $transactions,
        'advice' => $advice
    ]);
}


}