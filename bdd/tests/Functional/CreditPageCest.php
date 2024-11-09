<?php

declare(strict_types=1);

namespace Tests\Functional;

use Tests\Support\FunctionalTester;

/**
 * @covers \App\Controller\CreditPageAction
 */
class CreditPageCest
{
    public function _before(FunctionalTester $I): void
    {
    }

    // tests
    public function testOk(FunctionalTester $I): void
    {
        $I->amOnPage('/credit?amount=100000&periodInMonths=12');
        $I->see('Average payment is 9166');
    }

    public function testInvalidParams(FunctionalTester $I): void
    {
        $I->amOnPage('/credit?amount=100000&periodInMonths=0');
        $I->see('Error');
        $I->seeResponseCodeIs(400);
    }
}
