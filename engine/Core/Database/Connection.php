<?php

namespace Engine\Core\Database;

use \PDO;

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
        $config = [
            "db_name" => "",
            "host" => "127.0.0.1",
            "username" => "root",
            "password" => "",
            "charset" => "utf8"
        ];

        $dsn = "mysql:host=".$config['host'].";db_name=".$config['db_name'].";charset=".$config['charset'];

        $this->link = new PDO($dsn, $config['username'], $config['password']);

        return $this;
    }
}