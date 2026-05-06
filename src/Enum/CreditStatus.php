<?php

namespace App\Enum;

enum CreditStatus: string
{
    case PENDING = 'PENDING';
    case APPROVED = 'APPROVED';
    case CONTRACT_PENDING = 'CONTRACT_PENDING';
    case REJECTED = 'REJECTED';
    case ACTIVE = 'ACTIVE';
    case COMPLETED = 'COMPLETED';
    case CANCELLED = 'CANCELLED';
}
