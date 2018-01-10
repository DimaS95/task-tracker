<?php
include_once ROOT.'/models/Task.php';

include_once(ROOT . '/core/Controller.php');
use application\models\Task;

class PanelController extends Controller
{

public function actionIndex() 
{

    session_start();


	$tasks = Task::getAllTasks();


    switch ($this->post['btn'])
    {
        case "sort":
            $tasks = Task::sortedTasks($this->post);
            break;
        case "logout":
            session_destroy();
            header('Location: /main');
            break;
        case "Submit":
            $tasks = Task::getCheckedTasks($this->post);
            break;
    }

    require_once(ROOT.'/views/panel_view.php');

	return true;
}

}