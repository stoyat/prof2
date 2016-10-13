<?php

    require_once __DIR__ . '/autoload.php';
    $article = \App\Model\Article::findByid($_GET['id']);

    include __DIR__. '/App/view/article.php';
?>








