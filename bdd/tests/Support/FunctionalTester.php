<?php

declare(strict_types=1);

namespace Tests\Support;

/**
 * Inherited Methods
 * @method void wantTo($text)
 * @method void wantToTest($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause($vars = [])
 *
 * @SuppressWarnings(PHPMD)
*/
class FunctionalTester extends \Codeception\Actor
{
    use _generated\FunctionalTesterActions;

    /**
     * @Given Open credit page
     */
    public function openCreditPage(): void
    {
        $this->amOnPage('/credit');
    }

    /**
     * @Given I enter amount :num1:num2:num2:num2:num2:num2 RUB in form
     */
    public function iEnterAmountRUBInForm($num1, $num2, $num3, $num4, $num5, $num6): void
    {
        $this->fillField(['name' => 'amount'], "$num1$num2$num3$num4$num5$num6");
    }

    /**
     * @Given I enter period :num1:num2 months in form
     */
    public function iEnterPeriodMonthsInForm($num1, $num2): void
    {
        $this->fillField(['name' => 'periodInMonths'], "$num1$num2");
    }

    /**
     * @When I calculate
     */
    public function iCalculate(): void
    {
        $this->click('form input[type=submit]');
    }

    /**
     * @Then I should see that average price is :num1:num2:num2:num3
     */
    public function iShouldSeeThatAveragePriceIs($num1, $num2, $num3): void
    {
        $this->see("$num1$num2$num3", 'span');
    }
}
