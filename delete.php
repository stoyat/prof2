<?php
require_once __DIR__ . '/autoload.php';

$article = new \App\Model\Article();
$article->id = $_GET['id'];

if ( $article->id) {
    $article->delete();
    header('Location: /admin.php');
}