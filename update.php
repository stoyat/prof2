<?php
require_once __DIR__ . '/autoload.php';

$article = new \App\Model\Article();

$article->id = $_GET['id'];

if (isset($_POST['submit'])) {
    $article->title = $_POST['title'];
    $article->article = $_POST['article'];

    if (false !== $article->save()) {
        header('Location: /admin.php');
    }
}

$article = \App\Model\Article::findByid($article->id);
include __DIR__. '/App/view/admin/upd_form.php';