<?php

namespace App\Tests\Unit\Entity;

use App\Entity\Session;
use App\Entity\Utilisateur;
use PHPUnit\Framework\TestCase;

class SessionTest extends TestCase
{
    private Session $session;

    protected function setUp(): void
    {
        $this->session = new Session();
    }

    /**
     * Regle metier 1 : Creation de session avec token et utilisateur
     */
    public function testSessionCreation(): void
    {
        $utilisateur = new Utilisateur();

        $this->session->setUtilisateur($utilisateur);
        $this->session->setToken('session_token_abc123');

        $this->assertSame($utilisateur, $this->session->getUtilisateur());
        $this->assertEquals('session_token_abc123', $this->session->getToken());
    }

    /**
     * Regle metier 2 : La session expire apres 24 heures par defaut
     */
    public function testDefaultExpiration24Hours(): void
    {
        $now = new \DateTime();
        $expectedExpiry = (clone $now)->modify('+24 hours');

        $this->assertInstanceOf(\DateTimeInterface::class, $this->session->getDateCreation());
        $this->assertInstanceOf(\DateTimeInterface::class, $this->session->getDateExpiration());

        $diff = $this->session->getDateExpiration()->getTimestamp() - $this->session->getDateCreation()->getTimestamp();
        $this->assertEqualsWithDelta(86400, $diff, 5);
    }

    /**
     * Regle metier 3 : Session active par defaut
     */
    public function testDefaultActiveState(): void
    {
        $this->assertTrue($this->session->isEstActive());
    }

    /**
     * Regle metier 4 : Detection de session expiree
     */
    public function testIsExpiredWhenPastExpiration(): void
    {
        $this->session->setDateExpiration(new \DateTime('-1 hour'));

        $this->assertTrue($this->session->isExpired());
    }

    public function testIsNotExpiredWhenBeforeExpiration(): void
    {
        $this->session->setDateExpiration(new \DateTime('+1 hour'));

        $this->assertFalse($this->session->isExpired());
    }

    /**
     * Regle metier 5 : Une session est valide seulement si active ET non expiree
     */
    public function testIsValidWhenActiveAndNotExpired(): void
    {
        $this->session->setEstActive(true);
        $this->session->setDateExpiration(new \DateTime('+1 hour'));

        $this->assertTrue($this->session->isValid());
    }

    public function testIsInvalidWhenInactive(): void
    {
        $this->session->setEstActive(false);
        $this->session->setDateExpiration(new \DateTime('+1 hour'));

        $this->assertFalse($this->session->isValid());
    }

    public function testIsInvalidWhenExpired(): void
    {
        $this->session->setEstActive(true);
        $this->session->setDateExpiration(new \DateTime('-1 hour'));

        $this->assertFalse($this->session->isValid());
    }
}
