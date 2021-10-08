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
    protected Message $message;

    public function __construct()
    {
        $this->message = new Message;
    }

    /**
     * @Given j'ai un nouveau message :arg1
     */
    public function jaiUnNouveauMessage($message)
    {
        if (empty($message)) throw new Exception();
        $this->message->addMessage($message);
    }

    /**
     * @Then je dois avoir :arg1
     */
    public function jeDoisAvoir($arg1)
    {
        if($this->message->getMessageToUpperCase() !== strtoupper($arg1)) throw new Exception("ce n'est pas un message en majuscule.");
    }

    /**
     * @Then je dois avoir une exception :arg1
     */
    public function jeDoisAvoirUneException($arg1)
    {
        if(!$arg1 instanceof TypeError) throw new Exception("L'erreur attendu ne s'est pas activé.");
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
