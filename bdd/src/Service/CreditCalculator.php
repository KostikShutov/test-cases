<?php

declare(strict_types=1);

namespace App\Service;

use InvalidArgumentException;

/**
 * @see \Tests\Unit\Service\CreditCalculatorCest
 */
class CreditCalculator
{
    /**
     * Рассчитать платеж по кредиту в месяц
     */
    public function calculateAveragePayment(float $amount, int $periodInMonths): float
    {
        if ($amount <= 0 || $periodInMonths <= 0) {
            throw new InvalidArgumentException('Amount and period must be greater than 0');
        }

        /**
         * Максимальна тупая формула расчета
         */
        return round(($amount * 1.1) / $periodInMonths, 2);
    }
}
