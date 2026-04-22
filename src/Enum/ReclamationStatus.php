<?php

namespace App\Enum;

class ReclamationStatus
{
    const EN_ATTENTE = 'en_attente';
    const EN_COURS = 'en_cours';
    const TRAITE = 'traite';
    const REJETE = 'rejete';

    public static function getChoices(): array
    {
        return [
            'En attente' => self::EN_ATTENTE,
            'En cours' => self::EN_COURS,
            'Traité' => self::TRAITE,
            'Rejeté' => self::REJETE,
        ];
    }

    public static function getBadgeClass(string $status): string
    {
        return match($status) {
            self::EN_ATTENTE => 'warning',
            self::EN_COURS => 'info',
            self::TRAITE => 'success',
            self::REJETE => 'danger',
            default => 'secondary',
        };
    }
}