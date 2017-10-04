<?php
include_once ROOT.'/models/Task.php';
class ActionController
{
public function actionEdit()
{
	$id = $_GET['id'];
$result = Task::edit($id);
require_once(ROOT.'/views/edit_view.php');
return true;
}
public function actionDelete()
{
$result = Task::delete($_GET['id']);

return true;
}
} 