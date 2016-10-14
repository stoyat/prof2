<?php

namespace App;


class Config
{
    public $host;

    public function getHost()
    {
       $this->host = $_SERVER['SERVER_ADDR'];
    }

}