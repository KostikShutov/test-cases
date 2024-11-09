Feature: credit
  In order to take the credit
  As a customer
  I want to be able to calculate average amount

  Scenario: try credit
    Given Open credit page
    And I enter amount 100000 RUB in form
    And I enter period 12 months in form
    When I calculate
    Then I should see that average price is 9166
