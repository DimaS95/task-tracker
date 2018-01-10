<?php
include_once(ROOT.'/models/Admin.php');
include_once(ROOT.'/core/Controller.php');

//namespace application\controllers;

use application\models\Admin;

class AdminController extends Controller
{
    public function actionIndex($params = null)
    {

        session_start();

        if (isset($_SESSION['admin'])) {
            header('Location: /panel');
        }

        if (isset($this->post['btn'])) {

            $data = Admin::getData($this->post);

            if ($this->post['login'] == $data['name'] && $this->post['password'] == $data['password']) {
                $_SESSION['admin'] = $this->post['login'];
                session_start();
                header("Location:/panel/");

            } else {
                echo "access_denied";
            }
        }

        require_once(ROOT . '/views/admin_view.php');


        return true;

    }
}