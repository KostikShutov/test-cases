<?php

declare(strict_types=1);

namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class GoogleCest
{
    public function _before(AcceptanceTester $I): void
    {
        $I->setHeader('User-Agent', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36');
    }

    // tests
    public function tryToTest(AcceptanceTester $I): void
    {
        $I->amOnPage('https://google.com/');
        $I->see('Google');
    }
}
