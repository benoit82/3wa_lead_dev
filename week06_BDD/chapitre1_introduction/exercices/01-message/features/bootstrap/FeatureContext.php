<?php

use App\Message;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

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
    private Message $message;

    public function __construct()
    {
        $this->message = new Message;
    }

    /**
     * @Given j'ai un nouveau message :arg1
     */
    public function jaiUnNouveauMessage($message)
    {
        if ($message === "") throw new PendingException();
        $this->message->addMessage($message);
    }

    /**
     * @Then je dois avoir :arg1
     */
    public function jeDoisAvoir($arg1)
    {
        return $this->message->getMessageToUpperCase() === $arg1;
    }

    /**
     * @Then je dois avoir une exception :arg1
     */
    public function jeDoisAvoirUneException($arg1)
    {
        return $arg1 instanceof InvalidArgumentException;
    }

    /**
     * @Given j'ai un premier message :arg1
     */
    public function jaiUnPremierMessage($arg1)
    {
        $this->message->addMessage($arg1);

    }

    /**
     * @Given j'ai un deuxième message :arg1
     */
    public function jaiUnDeuxiemeMessage($arg1)
    {
        $this->message->addMessage($arg1);
    }
}
