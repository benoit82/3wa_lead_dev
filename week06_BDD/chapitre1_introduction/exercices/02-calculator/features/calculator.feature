Feature: Calculator memory
  In order to calculate addition
  As a calculator user
  I must be able to perform basic addition memorization operations and clear memory

Scenario Outline: Addition
    Given numbers <number1> <number2>
    Then I should have <sum> numbers

    Examples:
        | number1 | number2 | sum   |
        |  1      |  5      |  6    |
        |  20     |  10     |  30   |
        |  4      |  -7     |  -3   |

Scenario: Memory
    Given several calculations
    Then I should get all sums recorded

Scenario: Memory reset
    Given several calculations, I have sums memorized
    Then I should reset alls sums and get an empty array