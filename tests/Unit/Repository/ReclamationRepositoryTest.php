<?php

namespace App\Tests\Integration\Repository;

use App\Entity\Reclamation;
use App\Entity\Utilisateur;
use App\Repository\ReclamationRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Doctrine\ORM\EntityManagerInterface;

class ReclamationRepositoryTest extends KernelTestCase
{
    private ?EntityManagerInterface $entityManager;
    private ?ReclamationRepository $repository;
    private ?Utilisateur $testUser;

    protected function setUp(): void
    {
        $kernel = self::bootKernel();
        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
        $this->repository = $this->entityManager
            ->getRepository(Reclamation::class);
        
        // Créer un utilisateur de test
        $this->testUser = new Utilisateur();
        $this->testUser->setEmail('test_reclamation@example.com');
        $this->testUser->setNom('Test');
        $this->testUser->setPrenom('User');
        $this->entityManager->persist($this->testUser);
        $this->entityManager->flush();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        
        // Nettoyer les données de test
        if ($this->entityManager) {
            $this->repository->createQueryBuilder('r')
                ->delete()
                ->getQuery()
                ->execute();
            
            $this->entityManager->close();
        }
        
        $this->entityManager = null;
        $this->repository = null;
        $this->testUser = null;
    }

    private function createTestReclamation(string $sujet, string $statut = 'en_attente'): Reclamation
    {
        $reclamation = new Reclamation();
        $reclamation->setSujet($sujet);
        $reclamation->setDescription('Description test pour: ' . $sujet);
        $reclamation->setType('technique');
        $reclamation->setStatut($statut);
        $reclamation->setUtilisateur($this->testUser);
        $reclamation->setDateReclamation(new \DateTimeImmutable());
        
        $this->entityManager->persist($reclamation);
        return $reclamation;
    }

    public function testSaveReclamation(): void
    {
        $reclamation = $this->createTestReclamation('Test sauvegarde');
        $this->entityManager->flush();
        
        $id = $reclamation->getId();
        $savedReclamation = $this->repository->find($id);
        
        $this->assertNotNull($savedReclamation);
        $this->assertEquals('Test sauvegarde', $savedReclamation->getSujet());
        $this->assertSame($this->testUser, $savedReclamation->getUtilisateur());
    }

    public function testFindByStatus(): void
    {
        // Créer des réclamations avec différents statuts
        $this->createTestReclamation('En attente 1', 'en_attente');
        $this->createTestReclamation('En attente 2', 'en_attente');
        $this->createTestReclamation('Traitee 1', 'traitee');
        $this->entityManager->flush();
        
        $enAttente = $this->repository->findBy(['statut' => 'en_attente']);
        $traitees = $this->repository->findBy(['statut' => 'traitee']);
        
        $this->assertGreaterThanOrEqual(2, count($enAttente));
        $this->assertGreaterThanOrEqual(1, count($traitees));
        
        foreach ($enAttente as $reclamation) {
            $this->assertEquals('en_attente', $reclamation->getStatut());
        }
    }

    public function testFindByUser(): void
    {
        $this->createTestReclamation('Reclamation user 1');
        $this->createTestReclamation('Reclamation user 2');
        $this->entityManager->flush();
        
        $userReclamations = $this->repository->findBy(['utilisateur' => $this->testUser]);
        
        $this->assertIsArray($userReclamations);
        $this->assertGreaterThanOrEqual(2, count($userReclamations));
        
        foreach ($userReclamations as $reclamation) {
            $this->assertSame($this->testUser, $reclamation->getUtilisateur());
        }
    }

    public function testFindBetweenDates(): void
    {
        $oldDate = new \DateTimeImmutable('-10 days');
        $reclamationOld = $this->createTestReclamation('Ancienne');
        $reclamationOld->setDateReclamation($oldDate);
        
        $newDate = new \DateTimeImmutable('-1 day');
        $reclamationNew = $this->createTestReclamation('Recent');
        $reclamationNew->setDateReclamation($newDate);
        
        $this->entityManager->flush();
        
        $qb = $this->repository->createQueryBuilder('r');
        $qb->where('r.dateReclamation BETWEEN :start AND :end')
            ->setParameter('start', new \DateTimeImmutable('-5 days'))
            ->setParameter('end', new \DateTimeImmutable());
        
        $results = $qb->getQuery()->getResult();
        
        $this->assertIsArray($results);
    }

    public function testCountByStatus(): void
    {
        $this->createTestReclamation('Count 1', 'en_attente');
        $this->createTestReclamation('Count 2', 'en_attente');
        $this->createTestReclamation('Count 3', 'traitee');
        $this->entityManager->flush();
        
        $qb = $this->repository->createQueryBuilder('r');
        $qb->select('r.statut, COUNT(r.id) as total')
            ->groupBy('r.statut');
        
        $results = $qb->getQuery()->getResult();
        
        $this->assertIsArray($results);
        
        $foundEnAttente = false;
        $foundTraitee = false;
        
        foreach ($results as $result) {
            if ($result['statut'] === 'en_attente') {
                $foundEnAttente = true;
                $this->assertGreaterThanOrEqual(2, $result['total']);
            }
            if ($result['statut'] === 'traitee') {
                $foundTraitee = true;
                $this->assertGreaterThanOrEqual(1, $result['total']);
            }
        }
        
        $this->assertTrue($foundEnAttente);
        $this->assertTrue($foundTraitee);
    }

    public function testUpdateReclamationStatus(): void
    {
        $reclamation = $this->createTestReclamation('A traiter', 'en_attente');
        $this->entityManager->flush();
        
        $reclamation->setStatut('en_cours');
        $this->entityManager->flush();
        
        $updated = $this->repository->find($reclamation->getId());
        $this->assertEquals('en_cours', $updated->getStatut());
    }

    public function testDeleteReclamation(): void
    {
        $reclamation = $this->createTestReclamation('A supprimer');
        $this->entityManager->flush();
        
        $id = $reclamation->getId();
        $this->assertNotNull($this->repository->find($id));
        
        $this->entityManager->remove($reclamation);
        $this->entityManager->flush();
        
        $deleted = $this->repository->find($id);
        $this->assertNull($deleted);
    }

    public function testFindByType(): void
    {
        $this->createTestReclamation('Type technique', 'en_attente');
        $reclamation = $this->createTestReclamation('Type facturation', 'en_attente');
        $reclamation->setType('facturation');
        
        $this->entityManager->flush();
        
        $techniqueReclamations = $this->repository->findBy(['type' => 'technique']);
        $facturationReclamations = $this->repository->findBy(['type' => 'facturation']);
        
        $this->assertGreaterThanOrEqual(1, count($techniqueReclamations));
        $this->assertGreaterThanOrEqual(1, count($facturationReclamations));
    }
}