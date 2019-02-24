<?php
namespace Helloworld;
/**
 * Simple User class
 */
class User
{
    private $name;

    public function setName($name) {
    $this->name = $name;
    }

    public function getGreeting() {
    return 'hello '.$this->name;
    }
}
