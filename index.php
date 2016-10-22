<?php

require_once __DIR__ . '/autoload.php';

use App\Model\Article;
use App\View;

$news = Article::getLastnews(4);

$view = new View();
$view->news = $news;
//var_dump($view->news);

$html = $view->display(__DIR__. '/App/view/index.php');






