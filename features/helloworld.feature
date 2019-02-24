Feature: Say hello world
  In order to feel welcomed
  the world should be
  greeted when it loads the page

Scenario: Be Greeted
  Given that my username is the "world"
  When I initialise contact
  Then I should be told "hello world"
