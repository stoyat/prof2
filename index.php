<?php

require_once __DIR__ . '/autoload.php';

use App\Model\Article;
use App\View;

$view = new View();
$news = Article::getLastnews(4);

$view->news = $news;
$view->title = 'Главная';
//echo count($view);
//var_dump($view->news);

$html = $view->display(__DIR__. '/App/view/index.php');






