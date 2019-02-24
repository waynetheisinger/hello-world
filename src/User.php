<?php
namespace Helloworld;
/**
 * Simple User class
 */
class User
{
    private $name;

    public function setName($name) {
        if (!is_string($name)) {
        throw new \InvalidArgumentException('$name should be a string');
        }
    $this->name = $name;
    }

    public function getGreeting() {
        if ($this->name == 'world') {
        return 'hello '.$this->name;
        }
    }
}
