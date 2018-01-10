<?php

/**
 * Created by PhpStorm.
 * User: Дима
 * Date: 10.01.2018
 * Time: 15:27
 */
class Controller
{
    protected $post;
    protected $get;
    protected $files;


    public function __construct()
    {
        $this->post = $_POST;
        $this->get = $_GET;
        $this->files = $_FILES;

    }
}