<?php

namespace App;

abstract class Model
{
    public static $table;
    public $id;

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
     * update or insert
     */
    public function save ()
    {
        if (empty($this->id)) {
            $this->insert();
        } $this->update();
    }

    /**
     * return new obj
     */
    public function insert()
    {
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

    /**
     * update obj
     */
    public function update()
    {
            $columns = [];
            $data = [];
            foreach ($this as $item => $value) {
                if ('id' == $item) {
                    $data[':' . $item] = $value;
                    continue;
                }
                $columns[] = $item . ' = ' . ':' . $item;
                $data[':' . $item] = $value;
            }
            $sql = '
                UPDATE ' . static::$table . '
                SET ' . implode(',', $columns) .
                ' WHERE id = :id';
            $db = new DB();
            $db->execute($sql, $data);
    }

    /**
     * @param $id
     */
    public function delete()
    {
        $sql = '
            DELETE FROM ' . static::$table . '
            WHERE id=:id';
        $data[':id'] = $this->id;
        $db = new DB();
        $db->execute($sql, $data);
    }

}