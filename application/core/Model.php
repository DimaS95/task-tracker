<?php


namespace application\models;

use PDO;

class Model
{
    protected static function connect(){
        $name = 'root';
        $password = '';
        $db = new PDO('mysql:dbname=tasks;host = 127.0.0.1', $name, $password);
        return $db;
    }
}