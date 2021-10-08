<?php

use App\Calculator;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use PHPUnit\Framework\Assert;

use function PHPUnit\Framework\assertEquals;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    protected Calculator $calculator;

    public function __construct()
    {
        $this->calculator = new Calculator;
    }

    /**
     * @Given numbers :arg1 :arg2
     */
    public function numbers($number1, $number2)
    {
        $this->calculator->add($number1, $number2);
        // Assert::assertEquals($number1, $number2);
        Assert::assertEquals($number1 + $number2, $this->calculator->getMemory()[0][2]);
    }

    /**
     * @Then I should have :arg1 numbers
     */
    public function iShouldHaveNumbers($sum)
    {
        $tab = $this->calculator->getMemory();
        var_dump($tab);
        die;
        Assert::assertEquals($tab[0], $sum);
    }
}
