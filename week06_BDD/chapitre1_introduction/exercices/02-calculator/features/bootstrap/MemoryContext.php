<?php

use App\Calculator;
use PHPUnit\Framework\Assert;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Behat\Hook\Scope\AfterScenarioScope;
use Behat\Testwork\Hook\Scope\BeforeSuiteScope;

/**
 * Defines application features from the specific context.
 */
class MemoryContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    protected static $calculator;

    public function __construct()
    {
    }

    public static function gen() {
        yield [1, 5, 6];
        yield [20, 10, 30];
        yield [4, -7, -3];
        yield [145, 300, 445];
        yield [430.2, -0.2, 430];
        yield [100, 100, 200];
    }

    /**
     * @BeforeSuite
     */
    public static function prepare(BeforeSuiteScope $scope)
    {

        if (!isset(self::$calculator)) self::$calculator = new Calculator();
        $gen = self::gen();
        while($gen->valid()) {
            [$num1, $num2] = $gen->current();
            self::$calculator->add($num1, $num2);
            $gen->next();
        }
    }

    /**
     * @AfterScenario 
     */
    // public function cleanDB(AfterScenarioScope $scope)
    // {}

    /**
     * @Given several calculations
     */
    public function severalCalculations()
    {
        Assert::assertTrue(true);
    }

    /**
     * @Then I should get all sums recorded
     */
    public function iShouldGetAllSumsRecorded()
    {
        $allSums = self::$calculator->getMemory();
        $gen = self::gen();
        while ($gen->valid()) {
            $sum = $gen->current()[2];
            Assert::assertContainsEquals($sum, $allSums);
            $gen->next();
        }
    }

    /**
     * @Given several calculations, I have sums memorized
     */
    public function severalCalculationsIHaveSumsMemorized()
    {
        Assert::assertTrue(true);
    }

    /**
     * @Then I should reset alls sums and get an empty array
     */
    public function iShouldResetAllsSumsAndGetAnEmptyArray()
    {
        Assert::assertNotEmpty(self::$calculator->getMemory());
        self::$calculator->reset();
        Assert::assertEmpty(self::$calculator->getMemory());
    }
}
