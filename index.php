<?php

require_once __DIR__ . '/autoload.php';

use App\Model\User;

//$users = User::findAll();
//var_dump($users);

$users = User::findByid(2);
var_dump($users);


