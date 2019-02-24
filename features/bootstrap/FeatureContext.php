<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Helloworld\User;
use Webmozart\Assert\Assert;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private $parameters;
    private $screenshot_dir;
    private $user;
    private $myGreeting;
    private $illegalValue;
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
        $this->user = new User();
    }

    /**
     * @Given that my username is the :world
     */
    public function thatMyUsernameIsThe($world)
    {
        $this->user->setName($world);
    }

    /**
     * @When I initialise contact
     */
    public function iInitialiseContact()
    {
        $this->myGreeting = $this->user->getGreeting();
    }

    /**
     * @Then I should be told :helloWorld
     */
    public function iShouldBeTold($helloWorld)
    {
        Assert::eq($this->myGreeting, $helloWorld, 'We were not told hello world');
    }

    /**
     * @Given that my username is :notWorld
     */
    public function thatMyUsernameIs($notWorld)
    {
        $this->user->setName($notWorld);
    }

    /**
     * @Then I should not be told :helloworld
     */
    public function iShouldNotBeTold($helloWorld)
    {
        Assert::notEq($this->myGreeting,
        $helloWorld,
        'We were not told "hello world"');
    }

    /**
     * @Then no greeting should be shown
     */
    public function noGreetingShouldBeShown()
    {
        Assert::null($this->myGreeting, 'We were greeted');
    }

    /**
     * @Given that my username is and illegal value such as :arg1
     */
    public function thatMyUsernameIsAndIllegalValueSuchAs($arg1)
    {
        $this->illegalValue = $arg1;
    }

    /**
     * @Then an Exception should be thrown
     */
    public function anExceptionShouldBeThrown()
    {
        function myClosure($who) {
            return function() use ($who) {
                $user = new User();
                $user->setName((int) $who);
            };
        }
        $myClosure = myClosure($this->illegalValue);
        Assert::throws($myClosure);
    }
}
