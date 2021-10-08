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

    /**
     * @BeforeSuite
     *     Examples:
     *  | number1 | number2 | sum   |
     *  |  1      |  5      |  6    |
     *  |  20     |  10     |  30   |
     *  |  4      |  -7     |  -3   |
     */
    public static function prepare(BeforeSuiteScope $scope)
    {
        if (!isset(self::$calculator)) self::$calculator = new Calculator();
        self::$calculator->add(1, 5);
        self::$calculator->add(20, 10);
        self::$calculator->add(4, -7);
    }

    /**
     * @AfterScenario 
     */
    // public function cleanDB(AfterScenarioScope $scope)
    // {
    //     var_dump("ici after");
    // }

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
        Assert::assertContainsEquals(6, $allSums);
        Assert::assertContainsEquals(30, $allSums);
        Assert::assertContainsEquals(-3, $allSums);
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
