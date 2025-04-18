<?php

namespace Engine\Core\Database;

use \PDO;
use Engine\Core\Config\Config;

class Connection
{
    /**
     * @param $link
     */
    private $link;

    public function __construct()
    {
        $this->connect();
    }

    private function connect() 
    {
        $config = Config::file('database');

        $dsn = "mysql:host=".$config['host'].";db_name=".$config['db_name'].";charset=".$config['charset'];

        $this->link = new PDO($dsn, $config['username'], $config['password']);

        return $this;
    }
}