<?php

namespace App;

abstract class Model
{
    public static $table = 'foobar';

    /**
     * @return array
     */
    public static function findAll()
    {
        $db = new Db();
        $data = $db->query(
            'SELECT * FROM ' . static::$table,
            [],
            static::class
        );
        return $data;
    }
    /*
     * return 1 obj
     */
    public static function findByid($id)
    {
        $db = new Db();
        $data = $db->query(
            'SELECT * FROM ' . static::$table . ' WHERE id=:id',
            [':id' => $id],
            static::class
        )[0];
        return $data;
    }
}