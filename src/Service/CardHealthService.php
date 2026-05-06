<?php

namespace App\Service;

use App\Entity\TransactionCarte;

class CardHealthService
{
    public function calculate(array $transactions): int
    {
        $score = 100;

        foreach ($transactions as $t) {

            $amount = $t->getMontant();
            $hour = (int)$t->getDate()->format('H');

            // 💰 High amount
            if ($amount > 500) {
                $score -= 15;
            }

            // 🌙 Night transaction
            if ($hour < 6 || $hour > 23) {
                $score -= 10;
            }
        }

        // 🔁 Too many transactions
        if (count($transactions) > 10) {
            $score -= 10;
        }

        return max($score, 0);
    }
}