<?php

namespace App\Service;

use App\Entity\Compte;
use App\Entity\TransactionBancaire;
use App\Enum\TransactionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class TransactionService
{
    public function __construct(private EntityManagerInterface $em)
    {
    }

    public function effectuerVirement(Compte $source, string $destinationNumero, float $montant, string $description, ValidatorInterface $validator): string
    {
        if (!$source->isEstActif()) {
            return 'Votre compte est desactive. Impossible d\'effectuer un virement.';
        }

        $destinationNumero = trim($destinationNumero);
        $destination = $destinationNumero === ''
            ? null
            : $this->em->getRepository(Compte::class)->findOneBy(['numeroCompte' => $destinationNumero]);

        $transaction = new TransactionBancaire();
        $transaction->setCompteSource($source);
        $transaction->setCompteDestination($destination);
        $transaction->setType(TransactionType::VIREMENT);
        $transaction->setMontant(number_format($montant, 2, '.', ''));
        $transaction->setDescription($description ?: 'Virement');

        $validationMessage = $this->getValidationMessage($validator, $transaction);
        if ($validationMessage !== null) {
            return $validationMessage;
        }

        if (!$destination) {
            return 'Compte destinataire introuvable.';
        }

        if ((float) $source->getSolde() < $montant) {
            return 'Solde insuffisant.';
        }

        if (!$destination->isEstActif()) {
            return 'Le compte destinataire est inactif.';
        }

        $this->em->beginTransaction();
        try {
            $source->setSolde(number_format((float) $source->getSolde() - $montant, 2, '.', ''));
            $destination->setSolde(number_format((float) $destination->getSolde() + $montant, 2, '.', ''));

            $this->em->persist($transaction);
            $this->em->flush();
            $this->em->commit();

            return '';
        } catch (\Exception $e) {
            $this->em->rollback();
            return 'Erreur lors du virement: ' . $e->getMessage();
        }
    }

    public function effectuerRetrait(Compte $compte, float $montant, string $description, ValidatorInterface $validator): string
    {
        if (!$compte->isEstActif()) {
            return 'Votre compte est desactive. Impossible d\'effectuer un retrait.';
        }

        $transaction = new TransactionBancaire();
        $transaction->setCompteSource($compte);
        $transaction->setType(TransactionType::RETRAIT);
        $transaction->setMontant(number_format($montant, 2, '.', ''));
        $transaction->setDescription($description ?: 'Retrait');

        $validationMessage = $this->getValidationMessage($validator, $transaction);
        if ($validationMessage !== null) {
            return $validationMessage;
        }

        if ((float) $compte->getSolde() < $montant) {
            return 'Solde insuffisant.';
        }

        $this->em->beginTransaction();
        try {
            $compte->setSolde(number_format((float) $compte->getSolde() - $montant, 2, '.', ''));

            $this->em->persist($transaction);
            $this->em->flush();
            $this->em->commit();

            return '';
        } catch (\Exception $e) {
            $this->em->rollback();
            return 'Erreur lors du retrait: ' . $e->getMessage();
        }
    }

    public function effectuerDepot(Compte $compte, float $montant, string $description, bool $adminBypass = false, ?ValidatorInterface $validator = null): string
    {
        if (!$adminBypass && !$compte->isEstActif()) {
            return 'Le compte est desactive. Impossible d\'effectuer un depot.';
        }

        $transaction = new TransactionBancaire();
        $transaction->setCompteSource($compte);
        $transaction->setType(TransactionType::DEPOT);
        $transaction->setMontant(number_format($montant, 2, '.', ''));
        $transaction->setDescription($description ?: 'Depot');

        if ($validator !== null) {
            $validationMessage = $this->getValidationMessage($validator, $transaction);
            if ($validationMessage !== null) {
                return $validationMessage;
            }
        }

        $this->em->beginTransaction();
        try {
            $compte->setSolde(number_format((float) $compte->getSolde() + $montant, 2, '.', ''));

            $this->em->persist($transaction);
            $this->em->flush();
            $this->em->commit();

            return '';
        } catch (\Exception $e) {
            $this->em->rollback();
            return 'Erreur lors du depot: ' . $e->getMessage();
        }
    }

    private function getValidationMessage(ValidatorInterface $validator, TransactionBancaire $transaction): ?string
    {
        $violations = $validator->validate($transaction);

        foreach ($violations as $violation) {
            return $violation->getMessage();
        }

        return null;
    }
}
