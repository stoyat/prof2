<?php

require_once __DIR__ . '/autoload.php';

$news = \App\Model\Article::findAll();
include __DIR__. '/App/view/admin/index.php';
