<?php
include_once ROOT.'/models/Task.php';
class TaskController
{
public function actionIndex($params = null)
{
require_once(ROOT.'/views/task_view.php');
Task::get_data();
return true;
}

} 