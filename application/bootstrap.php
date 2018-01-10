<?php

define('ROOT', dirname(__FILE__));
require_once(ROOT.'/core/Router.php');


$router = new Router();
$router->run();

