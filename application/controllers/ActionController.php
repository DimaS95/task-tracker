<?php
include_once ROOT.'/models/Task.php';

include_once(ROOT . '/core/Controller.php');
use application\models\Task;

class ActionController extends Controller
{
public function actionEdit()
{
	$id = $this->get['id'];
	$text = Task::getText($id);
	if(isset($this->post['but'])) {
	  $text = $this->post['message'];
	  Task::edit($id, $text);
	}
	require_once(ROOT.'/views/edit_view.php');
	return true;
}

public function actionDelete()
{
	 Task::delete($this->get['id']);

	return true;
}

} 