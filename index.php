<?php

require_once __DIR__ . '/autoload.php';

use App\Model\User;
use App\Model\Article;

//$users = User::findAll();
//var_dump($users);

//$users = User::findByid(2);
//var_dump($users);

$article = Article::getLastnews(5);
var_dump($article);


