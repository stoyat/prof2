<?php

require_once __DIR__ . '/../autoload.php';
/**
 * execute
$test = new \App\Db();
//var_dump($test);
$result = $test->execute("CREATE TABLE news (id INTEGER ) ");
var_dump($result);
 */

/**
 * insert
$article = new \App\Model\Article();
$article->title = 'test';
$article->article = 'testtest';
$article->insert();
 */

/**
$config = new \App\Config();
echo $config->data['db']['host'];
*/

$config = \App\Config::getInstance();
echo $config->data['db']['host'];


