<?php
require_once __DIR__ . '/autoload.php';

$id = (int)$_GET['id'];

if (isset($id)) {
    \App\Model\Article::findById($id)->delete();
    header('Location: /admin.php');
}

