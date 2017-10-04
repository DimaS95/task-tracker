<?php
include_once ROOT.'/models/Task.php';
class EditController
{
public function actionIndex($params = null)
{
	$id = $_GET['id'];
$result = Task::edit($id);
require_once(ROOT.'/views/edit_view.php');
return true;
}

} 