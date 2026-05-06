<?php
use App\Entity\Reponse;
use App\Entity\Reclamation;
use PHPUnit\Framework\TestCase;

class ReponseTest extends TestCase
{
    private Reponse $reponse;
    private Reclamation $reclamation;

    protected function setUp(): void
    {
        $this->reponse = new Reponse();
        $this->reclamation = new Reclamation();
        $this->reclamation->setSujet('Reclamation test');
        $this->reclamation->setDescription('Description test');
    }

    public function testSetAndGetContenu(): void
    {
        $contenu = 'Voici ma r?ponse ? la r?clamation.';
        $this->reponse->setContenu($contenu);
        $this->assertEquals($contenu, $this->reponse->getContenu());
    }

    public function testSetAndGetAuteur(): void
    {
        $auteur = 'Admin Support';
        $this->reponse->setAuteur($auteur);
        $this->assertEquals($auteur, $this->reponse->getAuteur());
    }

    public function testSetAndGetReclamation(): void
    {
        $this->reponse->setReclamation($this->reclamation);
        $this->assertSame($this->reclamation, $this->reponse->getReclamation());
    }

    public function testDefaultDateReponseIsAutoSet(): void
    {
        $reponse = new Reponse();
        $this->assertInstanceOf(DateTimeImmutable::class, $reponse->getDateReponse());
    }

    public function testSetAndGetDateReponse(): void
    {
        $date = new \DateTimeImmutable('2024-01-15 10:30:00');
        $this->reponse->setDateReponse($date);
        $this->assertSame($date, $this->reponse->getDateReponse());
    }

    public function testIdIsInitiallyNull(): void
    {
        $this->assertNull($this->reponse->getId());
    }

    public function testFullReponseWorkflow(): void
    {
        $reponse = new Reponse();
        $reponse->setContenu('Probl?me r?solu, compte d?bloqu?.');
        $reponse->setAuteur('Agent Dubois');
        $reponse->setReclamation($this->reclamation);
        
        $this->assertEquals('Probl?me r?solu, compte d?bloqu?.', $reponse->getContenu());
        $this->assertEquals('Agent Dubois', $reponse->getAuteur());
        $this->assertSame($this->reclamation, $reponse->getReclamation());
        $this->assertInstanceOf(\DateTimeImmutable::class, $reponse->getDateReponse());
    }

    public function testChainedSetters(): void
    {
        $date = new \DateTimeImmutable();
        
        $this->reponse
            ->setContenu('R?ponse cha?n?e')
            ->setAuteur('Testeur')
            ->setReclamation($this->reclamation)
            ->setDateReponse($date);
        
        $this->assertEquals('R?ponse cha?n?e', $this->reponse->getContenu());
        $this->assertEquals('Testeur', $this->reponse->getAuteur());
        $this->assertSame($this->reclamation, $this->reponse->getReclamation());
        $this->assertSame($date, $this->reponse->getDateReponse());
    }
}
