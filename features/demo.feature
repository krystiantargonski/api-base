# This file contains a user story for demonstration only.
# Learn how to get started with Behat and BDD on Behat's website:
# http://behat.org/en/latest/quick_start.html

Feature:
  In order to prove that the Behat Symfony extension is correctly installed
  As a user
  I want to have a demo scenario

  Scenario: It receives a response from Symfony's kernel
    When I request "GET /"
    Then the response status code should be 200
    When I request "PUT /"
    Then the response status code should be 406
