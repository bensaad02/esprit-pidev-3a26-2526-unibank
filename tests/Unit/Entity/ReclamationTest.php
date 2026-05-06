<?php

namespace App\Tests\Unit\Entity;

use App\Entity\Reclamation;
use App\Entity\Utilisateur;
use Doctrine\Common\Collections\Collection;
use PHPUnit\Framework\TestCase;

class ReclamationTest extends TestCase
{
    private Reclamation $reclamation;

    protected function setUp(): void
    {
        $this->reclamation = new Reclamation();
    }

    public function testReclamationCreation(): void
    {
        $utilisateur = new Utilisateur();
        
        $this->reclamation->setSujet('Test sujet');
        $this->reclamation->setDescription('Test description');
        $this->reclamation->setType('technique');
        $this->reclamation->setStatut('en_attente');
        $this->reclamation->setUtilisateur($utilisateur);
        $this->reclamation->setSentiment('positif');
        $this->reclamation->setToken('token123');

        $this->assertEquals('Test sujet', $this->reclamation->getSujet());
        $this->assertEquals('Test description', $this->reclamation->getDescription());
        $this->assertEquals('technique', $this->reclamation->getType());
        $this->assertEquals('en_attente', $this->reclamation->getStatut());
        $this->assertSame($utilisateur, $this->reclamation->getUtilisateur());
        $this->assertEquals('positif', $this->reclamation->getSentiment());
        $this->assertEquals('token123', $this->reclamation->getToken());
    }

    public function testDefaultValues(): void
    {
        $this->assertEquals('en_attente', $this->reclamation->getStatut());
        $this->assertInstanceOf(\DateTimeImmutable::class, $this->reclamation->getDateReclamation());
        $this->assertInstanceOf(Collection::class, $this->reclamation->getReponses());
        $this->assertCount(0, $this->reclamation->getReponses());
        $this->assertNull($this->reclamation->getImagePath());
        $this->assertNull($this->reclamation->getReponse());
        $this->assertNull($this->reclamation->getToken());
    }

    public function testStatusChanges(): void
    {
        $this->reclamation->setStatut('en_cours');
        $this->assertEquals('en_cours', $this->reclamation->getStatut());
        
        $this->reclamation->setStatut('traitee');
        $this->assertEquals('traitee', $this->reclamation->getStatut());
    }

    public function testGetterAndSetter(): void
    {
        $date = new \DateTimeImmutable();
        $this->reclamation->setDateReclamation($date);
        $this->assertSame($date, $this->reclamation->getDateReclamation());
        
        $this->reclamation->setImagePath('image.jpg');
        $this->assertEquals('image.jpg', $this->reclamation->getImagePath());
        
        $this->reclamation->setReponse('Reponse test');
        $this->assertEquals('Reponse test', $this->reclamation->getReponse());
    }
}