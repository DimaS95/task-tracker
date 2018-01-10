<?php

namespace application\models;

include_once(ROOT . '/core/Model.php');
use PDO;

class Admin extends Model
{

public static function getData($params){

    $db = self::connect();
    $login = $params['login'];
    $password = $params['password'];
    $data = $db->prepare("SELECT `name`,`password` FROM `admin` WHERE name = '$login' AND password = '$password'");
    $data->execute();
    $data = $data->fetch();
    return $data;
}
}
