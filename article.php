<?php

require_once __DIR__ . '/autoload.php';
$article = \App\Model\Article::findByid($_GET['id']);
?>

    <h3>
        <?echo $article ->title; ?>
    </h3>
    <p>
        <?echo $article ->article; ?>
    </p>



