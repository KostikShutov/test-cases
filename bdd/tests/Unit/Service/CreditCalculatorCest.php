<?php

declare(strict_types=1);

namespace Tests\Unit\Service;

use App\Service\CreditCalculator;
use InvalidArgumentException;
use Tests\Support\UnitTester;

/**
 * @covers \App\Service\CreditCalculator
 */
class CreditCalculatorCest
{
    private CreditCalculator $creditCalculator;

    public function _before(UnitTester $I): void
    {
        $this->creditCalculator = new CreditCalculator();
    }

    // tests
    public function testOk(UnitTester $I): void
    {
        $iWantAmount = 100_000;
        $iWantPeriodInMonths = 12;

        $actual = $this->creditCalculator->calculateAveragePayment(
            amount: $iWantAmount,
            periodInMonths: $iWantPeriodInMonths,
        );

        $I->assertSame(9166.67, $actual);
    }

    public function testException(UnitTester $I): void
    {
        $iWantAmount = 100_000;
        $iWantPeriodInMonths = 0;

        $I->expectThrowable(
            new InvalidArgumentException('Amount and period must be greater than 0'),
            function() use ($iWantAmount, $iWantPeriodInMonths): void {
                $this->creditCalculator->calculateAveragePayment(
                    amount: $iWantAmount,
                    periodInMonths: $iWantPeriodInMonths,
                );
            },
        );
    }
}
