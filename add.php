<?php
require_once __DIR__ . '/autoload.php';

$article = new \App\Model\Article();

if (isset($_POST['submit'])) {
    $article->title = $_POST['title'];
    $article->article = $_POST['article'];

    if (false !== $article->save()) {
        header('Location: /admin.php');
    }
}
include __DIR__. '/App/view/admin/add_form.php';