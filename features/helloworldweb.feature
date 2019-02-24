@javascript
Feature: Hello world web
  In order to feel welcomed
  As the website user world
  I need to see hello world

  Scenario: Visiting the homepage
    When I am on "http://behat:8000/"
    Then I should see "hello world"
