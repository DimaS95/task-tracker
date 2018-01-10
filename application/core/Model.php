<?php
/**
 * Created by PhpStorm.
 * User: Дима
 * Date: 10.01.2018
 * Time: 15:26
 */

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