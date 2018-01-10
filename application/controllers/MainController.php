<?php


//namespace application\controllers;

use application\models\Task;

include_once ROOT.'/models/Task.php';
include_once(ROOT . '/core/Controller.php');


class MainController extends Controller
{

public function actionIndex($params = null)
{
	$page = isset($this->get['page']) ? (int)$this->get['page'] : 1;
	$perPage = isset($this->get['per-page']) && $this->get['per-page'] <= 50 ? (int)$this->get['per-page'] : 3;
	$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

	$tasks = Task::getTasks($start, $perPage);

	$pages = Task::pagination($perPage);

	require_once(ROOT.'/views/mainPage_view.php');
	return true;
}

}