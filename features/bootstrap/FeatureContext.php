<?php

use Behat\Behat\Tester\Exception\PendingException;
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
    public function __construct($parameters)
    {
      $this->parameters = $parameters;
      if (isset($parameters['screenshot_dir'])) {
        $this->screenshot_dir = $parameters['screenshot_dir'];
      }
    }

    /**
     * @Given that my username is the :world
     */
    public function thatMyUsernameIsThe($world)
    {
        $this->user->name($world);
    }

    /**
     * @When I initialise contact
     */
    public function iInitialiseContact()
    {
        throw new PendingException();
    }

    /**
     * @Then I should be told :helloWorld
     */
    public function iShouldBeTold($helloWorld)
    {
        throw new PendingException();
    }
}
