<?php
require "vendor/autoload.php";

use Helloworld\User;

$user = new User();
$user->setName('world');
echo $user->getGreeting();
