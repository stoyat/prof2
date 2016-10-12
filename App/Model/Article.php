<?php

namespace App\Model;

use App\Db;
use App\Model;

class Article
    extends Model
{
    const LIMITED = 3;

    public static $table = 'news';
    public $id;
    public $title;
    public $article;

    /*
     * return count - LIMITED article
     */
    public static function getLastnews()
    {
        $db = new Db();
        $data = $db->query(
            'SELECT * FROM ' . self::$table . ' ORDER BY `id` DESC LIMIT ' .self::LIMITED,
            [],
            self::class
        );
        return $data;
     }
}

