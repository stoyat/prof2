<?php

namespace App\Model;

use App\Db;
use App\Model;

/**
 * Class Article
 * @package App\Model
 * @property $author
 */
class Article
    extends Model
{
    public static $table = 'news';
    public $id;
    public $title;
    public $article;
    public $author_id;

    /*
     * return count - LIMITED article
     */
    public static function getLastnews($limit)
    {
        $db = DB::getInstance();
        $data = $db->query(
            'SELECT * FROM ' . static::$table . ' ORDER BY `id` DESC LIMIT ' . $limit,
            [],
            static::class
        );
        return $data;
     }

    /**
     * @param $name
     * @return bool|null
     */
    public function __get($name)
    {
        if ($name = 'author') {
          return  Author::findByid($this->author_id);
        } else {
            return null;
        }
    }

    public function __isset($name)
    {
        if ($name = 'author') {
            return true;
        } else {
            return null;
        }
    }
}
