<?php


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