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

    /*
     * return count - LIMITED article
     */
    public static function getLastnews($limit)
    {
        $db = new Db();
        $data = $db->query(
            'SELECT * FROM ' . static::$table . ' ORDER BY `id` DESC LIMIT ' . $limit,
            [],
            static::class
        );
        return $data;
     }
}

