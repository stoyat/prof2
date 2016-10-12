<?php

require_once __DIR__ . '/autoload.php';

use App\Model\Article;

$news = Article::getLastnews();

    foreach ($news as $item): ?>
        <h3>
            <? echo $item->title;?>
        </h3>
        <p>
            <?
                $item->article = substr( $item->article,0,235);
                $item->article = substr( $item->article,0,strrpos($item->article, ' '));
                echo $item->article;
            ?>
        </p>
        <br>
            <a href="article.php?id=<? echo $item->id?>">Перейти к новости</a>
        <br>
  <? endforeach; ?>






