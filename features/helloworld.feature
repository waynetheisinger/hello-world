Feature: Say hello world
  In order to feel welcomed
  the world should be
  greeted when it loads the page

Scenario: Be Greeted
  Given that my username is the "world"
  When I initialise contact
  Then I should be told "hello world"

Scenario: Don't greet other users
  Given that my username is "not the world"
  When I initialise contact
  Then I should not be told "hello world"
  And no greeting should be shown

Scenario: Throw exception on illegal types
  Given that my username is and illegal value such as 3
  When I initialise contact
  Then an Exception should be thrown
