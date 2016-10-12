<?php

namespace App\Model;

use App\Db;
use App\Model;

class Article
    extends Model
{
    public static $table = 'news';

    public $id;
    public $title;
    public $article;

    public static function getLastnews( int $limit)
    {
        $db = new Db();
        $data = $db->query(
            'SELECT * FROM ' . self::$table . ' ORDER BY `id` DESC LIMIT ' .$limit,
            [],
            self::class
        );
        return $data;
     }
}

