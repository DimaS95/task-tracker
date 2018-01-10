<?php
include_once ROOT.'/models/Task.php';
//namespace application\controllers;
include_once(ROOT . '/core/Controller.php');
use application\models\Task;

class TaskController extends Controller
{
public function actionIndex($params = null)
{

    if (isset($this->post["but"])) {
       // $params = $_POST;
       // $files = $_FILES;
        Task::save($this->post, $this->files);
    }
    require_once(ROOT.'/views/task_view.php');
    return true;
}

} 