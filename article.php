<?php

require_once __DIR__ . '/autoload.php';

use App\Model\Article;
use App\View;

$view = new View();
$article = Article::findByid($_GET['id']);
$view->article = $article;
$view->title = 'Одна Новость';
//var_dump($view->article);

$html = $view->display(__DIR__. '/App/view/article.php');









