<?php

require_once __DIR__ . '/autoload.php';

use App\Model\Article;

$news = Article::getLastnews(3);

include __DIR__. '/App/view/index.php';






