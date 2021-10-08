Feature: Memory
  In order to calculate addition
  As a calculator user
  I must be able to perform basic addition memorization operations and clear memory

Scenario: Memory
    Given several calculations
    Then I should get all sums recorded

Scenario: Memory reset
    Given several calculations, I have sums memorized
    Then I should reset alls sums and get an empty memory