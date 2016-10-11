<?php

require_once __DIR__ . '/../autoload.php';

$test = new \App\Db();
//var_dump($test);
$result = $test->execute("CREATE TABLE news (id INTEGER ) ");
var_dump($result);