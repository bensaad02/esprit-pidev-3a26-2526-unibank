<?php

namespace App\Tests\Unit\Entity;

use App\Entity\Credit;
use App\Entity\Utilisateur;
use App\Enum\CreditStatus;
use App\Enum\TypeContrat;
use PHPUnit\Framework\TestCase;

class CreditTest extends TestCase
{
    private Credit $credit;

    protected function setUp(): void
    {
        $this->credit = new Credit();
    }

    public function testCreditCreation(): void
    {
        $client = new Utilisateur();

        $this->credit->setClient($client);
        $this->credit->setMontant('12000.00');
        $this->credit->setTauxInteret('12.00');
        $this->credit->setDureeEnMois(12);
        $this->credit->setStatut(CreditStatus::PENDING);
        $this->credit->setMotifDemande('Achat de materiel professionnel');
        $this->credit->setSalaireMensuel('4000.00');
        $this->credit->setTypeContrat(TypeContrat::PAIEMENT_MENSUEL);

        $this->assertSame($client, $this->credit->getClient());
        $this->assertEquals('12000.00', $this->credit->getMontant());
        $this->assertEquals('12.00', $this->credit->getTauxInteret());
        $this->assertEquals(12, $this->credit->getDureeEnMois());
        $this->assertSame(CreditStatus::PENDING, $this->credit->getStatut());
        $this->assertEquals('Achat de materiel professionnel', $this->credit->getMotifDemande());
        $this->assertEquals('4000.00', $this->credit->getSalaireMensuel());
        $this->assertSame(TypeContrat::PAIEMENT_MENSUEL, $this->credit->getTypeContrat());
    }

    public function testDefaultValues(): void
    {
        $this->assertSame(CreditStatus::PENDING, $this->credit->getStatut());
        $this->assertInstanceOf(\DateTimeInterface::class, $this->credit->getDateCreation());
        $this->assertInstanceOf(\DateTimeInterface::class, $this->credit->getDateMaj());
        $this->assertNull($this->credit->getAgent());
        $this->assertNull($this->credit->getMotifRejet());
        $this->assertNull($this->credit->getDateTraitement());
    }

    public function testCalculatePayments(): void
    {
        $this->credit->setMontant('12000.00');
        $this->credit->setTauxInteret('12.00');
        $this->credit->setDureeEnMois(12);

        $this->credit->calculatePayments();

        $this->assertNotNull($this->credit->getMensualite());
        $this->assertNotNull($this->credit->getMontantTotal());
        $this->assertGreaterThan(0, (float) $this->credit->getMensualite());
        $this->assertGreaterThan((float) $this->credit->getMontant(), (float) $this->credit->getMontantTotal());
    }

    public function testCalculatePaymentsWithZeroRate(): void
    {
        $this->credit->setMontant('12000.00');
        $this->credit->setTauxInteret('0.00');
        $this->credit->setDureeEnMois(12);

        $this->credit->calculatePayments();

        $this->assertEquals('1000.00', $this->credit->getMensualite());
        $this->assertEquals('12000.00', $this->credit->getMontantTotal());
    }

    public function testGetCoutCredit(): void
    {
        $this->credit->setMontant('12000.00');
        $this->credit->setTauxInteret('12.00');
        $this->credit->setDureeEnMois(12);

        $this->credit->calculatePayments();

        $expectedCost = (float) $this->credit->getMontantTotal() - (float) $this->credit->getMontant();

        $this->assertEquals($expectedCost, $this->credit->getCoutCredit());
    }
}
