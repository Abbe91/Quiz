<?php

class Database {

    function __construct() {
        $dsn = 'mysql:host=localhost;dbname=database_quiz;';
        $user = 'root';
        $password = 'root';

        $this->connection = new PDO($dsn, $user, $password);
        $this->connection->exec("set names utf8");
    }

}

?>