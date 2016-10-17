<?php

namespace App;

use App\Config;
class Db
{
    use Singleton;

    protected $dbh;

    protected function __construct()
    {
        $config = Config::getInstance();
        $this->dbh = new \PDO('mysql:host=' . $config->data['db']['host'] .
                                ';dbname=' . $config->data['db']['dbname'],
                                             $config->data['db']['user'],
                                            $config->data['db']['password']);
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

    /**
     * @return string
     */

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

}