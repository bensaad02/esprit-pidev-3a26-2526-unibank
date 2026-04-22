<?php

namespace App\Enum;

enum TransactionType: string
{
    case VIREMENT = 'VIREMENT';
    case RETRAIT = 'RETRAIT';
    case DEPOT = 'DEPOT';
}
