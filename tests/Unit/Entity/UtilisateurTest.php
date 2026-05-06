<?php

namespace App\Tests\Unit\Entity;

use App\Entity\Utilisateur;
use App\Enum\UserType;
use App\Enum\ClientStatus;
use Doctrine\Common\Collections\Collection;
use PHPUnit\Framework\TestCase;

class UtilisateurTest extends TestCase
{
    private Utilisateur $utilisateur;

    protected function setUp(): void
    {
        $this->utilisateur = new Utilisateur();
    }

    /**
     * Regle metier 1 : Creation complete d'un utilisateur avec tous les champs
     */
    public function testUtilisateurCreation(): void
    {
        $dateNaissance = new \DateTime('1990-05-15');

        $this->utilisateur->setNom('Kaboudi');
        $this->utilisateur->setPrenom('Aziz');
        $this->utilisateur->setEmail('aziz@unibank.tn');
        $this->utilisateur->setMotDePasse('hashedPassword123');
        $this->utilisateur->setTelephone('+21612345678');
        $this->utilisateur->setCin('12345678');
        $this->utilisateur->setAdresse('Rue de Tunis, 1000');
        $this->utilisateur->setDateNaissance($dateNaissance);
        $this->utilisateur->setRole(UserType::CLIENT);

        $this->assertEquals('Kaboudi', $this->utilisateur->getNom());
        $this->assertEquals('Aziz', $this->utilisateur->getPrenom());
        $this->assertEquals('aziz@unibank.tn', $this->utilisateur->getEmail());
        $this->assertEquals('hashedPassword123', $this->utilisateur->getMotDePasse());
        $this->assertEquals('+21612345678', $this->utilisateur->getTelephone());
        $this->assertEquals('12345678', $this->utilisateur->getCin());
        $this->assertEquals('Rue de Tunis, 1000', $this->utilisateur->getAdresse());
        $this->assertSame($dateNaissance, $this->utilisateur->getDateNaissance());
        $this->assertSame(UserType::CLIENT, $this->utilisateur->getRole());
    }

    /**
     * Regle metier 2 : Valeurs par defaut a la creation
     * - Role par defaut = CLIENT
     * - estActif = false (en attente de validation)
     * - isVerified = false (email non verifie)
     * - Collections initialisees vides
     */
    public function testDefaultValues(): void
    {
        $this->assertSame(UserType::CLIENT, $this->utilisateur->getRole());
        $this->assertFalse($this->utilisateur->isEstActif());
        $this->assertFalse($this->utilisateur->isVerified());
        $this->assertInstanceOf(\DateTimeInterface::class, $this->utilisateur->getDateCreation());
        $this->assertInstanceOf(\DateTimeInterface::class, $this->utilisateur->getDateMaj());
        $this->assertInstanceOf(Collection::class, $this->utilisateur->getComptes());
        $this->assertCount(0, $this->utilisateur->getComptes());
        $this->assertInstanceOf(Collection::class, $this->utilisateur->getCartes());
        $this->assertCount(0, $this->utilisateur->getCartes());
        $this->assertInstanceOf(Collection::class, $this->utilisateur->getReclamations());
        $this->assertCount(0, $this->utilisateur->getReclamations());
        $this->assertNull($this->utilisateur->getVerificationToken());
        $this->assertNull($this->utilisateur->getBanUntil());
        $this->assertNull($this->utilisateur->getBanReason());
        $this->assertNull($this->utilisateur->getClientStatus());
    }

    /**
     * Regle metier 3 : Le role determine les permissions (ROLE_CLIENT ou ROLE_AGENT)
     */
    public function testGetRolesClient(): void
    {
        $this->utilisateur->setRole(UserType::CLIENT);
        $roles = $this->utilisateur->getRoles();

        $this->assertContains('ROLE_CLIENT', $roles);
        $this->assertContains('ROLE_USER', $roles);
        $this->assertNotContains('ROLE_AGENT', $roles);
    }

    public function testGetRolesAgent(): void
    {
        $this->utilisateur->setRole(UserType::AGENT);
        $roles = $this->utilisateur->getRoles();

        $this->assertContains('ROLE_AGENT', $roles);
        $this->assertContains('ROLE_USER', $roles);
        $this->assertNotContains('ROLE_CLIENT', $roles);
    }

    /**
     * Regle metier 4 : Systeme de ban (permanent et temporaire)
     */
    public function testIsBannedPermanent(): void
    {
        $this->utilisateur->setEstActif(false);
        $this->utilisateur->setBanUntil(null);

        $this->assertTrue($this->utilisateur->isBanned());
    }

    public function testIsBannedTemporary(): void
    {
        $this->utilisateur->setEstActif(false);
        $this->utilisateur->setBanUntil(new \DateTime('+7 days'));

        $this->assertTrue($this->utilisateur->isBanned());
    }

    public function testIsNotBannedWhenActive(): void
    {
        $this->utilisateur->setEstActif(true);

        $this->assertFalse($this->utilisateur->isBanned());
    }

    public function testIsNotBannedWhenBanExpired(): void
    {
        $this->utilisateur->setEstActif(false);
        $this->utilisateur->setBanUntil(new \DateTime('-1 day'));

        $this->assertFalse($this->utilisateur->isBanned());
    }

    /**
     * Regle metier 5 : L'identifiant utilisateur est l'email
     */
    public function testGetUserIdentifier(): void
    {
        $this->utilisateur->setEmail('test@unibank.tn');

        $this->assertEquals('test@unibank.tn', $this->utilisateur->getUserIdentifier());
    }

    /**
     * Regle metier 6 : Le mot de passe est accessible via getPassword()
     */
    public function testGetPassword(): void
    {
        $this->utilisateur->setMotDePasse('secureHash');

        $this->assertEquals('secureHash', $this->utilisateur->getPassword());
    }

    /**
     * Regle metier 7 : Le nom complet est la concatenation prenom + nom
     */
    public function testGetFullName(): void
    {
        $this->utilisateur->setPrenom('Aziz');
        $this->utilisateur->setNom('Kaboudi');

        $this->assertEquals('Aziz Kaboudi', $this->utilisateur->getFullName());
    }

    /**
     * Regle metier 8 : Systeme de verification par token
     */
    public function testVerificationTokenSystem(): void
    {
        $expiry = new \DateTime('+24 hours');

        $this->utilisateur->setVerificationToken('abc123');
        $this->utilisateur->setTokenExpiry($expiry);

        $this->assertEquals('abc123', $this->utilisateur->getVerificationToken());
        $this->assertSame($expiry, $this->utilisateur->getTokenExpiry());
    }

    /**
     * Regle metier 9 : Gestion du statut client (PENDING, APPROVED, REJECTED, SUSPENDED)
     */
    public function testClientStatusManagement(): void
    {
        $this->utilisateur->setClientStatus(ClientStatus::PENDING);
        $this->assertSame(ClientStatus::PENDING, $this->utilisateur->getClientStatus());

        $this->utilisateur->setClientStatus(ClientStatus::APPROVED);
        $this->assertSame(ClientStatus::APPROVED, $this->utilisateur->getClientStatus());

        $this->utilisateur->setClientStatus(ClientStatus::REJECTED);
        $this->assertSame(ClientStatus::REJECTED, $this->utilisateur->getClientStatus());

        $this->utilisateur->setClientStatus(ClientStatus::SUSPENDED);
        $this->assertSame(ClientStatus::SUSPENDED, $this->utilisateur->getClientStatus());
    }

    /**
     * Regle metier 10 : Ban avec raison
     */
    public function testBanWithReason(): void
    {
        $this->utilisateur->setEstActif(false);
        $this->utilisateur->setBanReason('Activite suspecte');
        $this->utilisateur->setBanUntil(new \DateTime('+30 days'));

        $this->assertEquals('Activite suspecte', $this->utilisateur->getBanReason());
        $this->assertTrue($this->utilisateur->isBanned());
    }

    /**
     * Regle metier 11 : Champs agent (matricule et departement)
     */
    public function testAgentFields(): void
    {
        $this->utilisateur->setRole(UserType::AGENT);
        $this->utilisateur->setMatricule('AGT-001');
        $this->utilisateur->setDepartement('Service Client');

        $this->assertEquals('AGT-001', $this->utilisateur->getMatricule());
        $this->assertEquals('Service Client', $this->utilisateur->getDepartement());
        $this->assertSame(UserType::AGENT, $this->utilisateur->getRole());
    }

    /**
     * Test eraseCredentials ne leve pas d'exception
     */
    public function testEraseCredentials(): void
    {
        $this->utilisateur->setMotDePasse('password');
        $this->utilisateur->eraseCredentials();
        // eraseCredentials is required by UserInterface, verify it runs without exception
        $this->assertNotNull($this->utilisateur->getPassword());
    }
}
