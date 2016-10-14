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
        );
        return $data[0] ?? false;
    }

    /**
     * @return bool
     */

    public function isNew()
    {
        return empty($this->id);
    }

    /**
     * return new obj
     */
    public function insert()
    {
        if ($this->isNew()) {
            $columns = [];
            $binds = [];
            $data = [];
            foreach ($this as $column => $value) {
                if ('id' == $column) {
                    continue;
                }
                $columns[] = $column;
                $binds[] = ':' . $column;
                $data[':' . $column] = $value;
            }
            $sql = '
                INSERT INTO ' . static::$table . '
                (' . implode(', ', $columns). ')
                VALUES
                (' . implode(', ', $binds). ')
                ';
            $db = new Db();
            $db->execute($sql, $data);
            $this->id = $db->lastInsertId();
        }
    }
}