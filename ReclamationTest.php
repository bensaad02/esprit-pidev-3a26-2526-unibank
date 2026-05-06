<?php
use App\Entity\Reclamation;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/vendor/autoload.php';

class ReclamationTest extends TestCase
{
    public function testSetAndGetSujet(): void
    {
        $reclamation = new Reclamation();
        $reclamation->setSujet('Probl?me de connexion');
        $this->assertEquals('Probl?me de connexion', $reclamation->getSujet());
    }

    public function testSetAndGetDescription(): void
    {
        $reclamation = new Reclamation();
        $reclamation->setDescription('Je n\'arrive pas ? me connecter');
        $this->assertEquals('Je n\'arrive pas ? me connecter', $reclamation->getDescription());
    }

    public function testDefaultStatusIsEnAttente(): void
    {
        $reclamation = new Reclamation();
        $this->assertEquals('en_attente', $reclamation->getStatut());
    }

    public function testSetAndGetStatut(): void
    {
        $reclamation = new Reclamation();
        $reclamation->setStatut('traitee');
        $this->assertEquals('traitee', $reclamation->getStatut());
    }

    public function testSetAndGetType(): void
    {
        $reclamation = new Reclamation();
        $reclamation->setType('technique');
        $this->assertEquals('technique', $reclamation->getType());
    }

    public function testDateReclamationIsAutoSet(): void
    {
        $reclamation = new Reclamation();
        $this->assertInstanceOf(DateTimeImmutable::class, $reclamation->getDateReclamation());
    }

    public function testSetAndGetToken(): void
    {
        $reclamation = new Reclamation();
        $reclamation->setToken('abc123token');
        $this->assertEquals('abc123token', $reclamation->getToken());
    }

    public function testSetAndGetImagePath(): void
    {
        $reclamation = new Reclamation();
        $reclamation->setImagePath('uploads/image.jpg');
        $this->assertEquals('uploads/image.jpg', $reclamation->getImagePath());
    }
}
