<?php

namespace App;

class Db
{

    protected $dbh;

    public function __construct()
    {
        $this->dbh = new \PDO('mysql:host=127.0.0.1;dbname=php2', 'root', '');
    }

    /**
     * @param string $sql
     * @param array $data
     * @return bool
     */
    public function execute(string $sql, array $data = [])
    {
        $sth = $this->dbh->prepare($sql);
        $result = $sth->execute($data);
        if (false === $result) {
            var_dump( $sth->errorInfo() );
            die;
        }
        return true;
    }

    /**
     * @param string $sql
     * @param array $data
     * @param null $class
     * @return array,obj
     */
    public function query(string $sql, array $data = [], $class = null)
    {
        $sth = $this->dbh->prepare($sql);
        $result = $sth->execute($data);
        if (false === $result) {
            var_dump( $sth->errorInfo() );
            die;
        }
        if (null === $class) {
            return $sth->fetchAll();
        } else {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
    }

}