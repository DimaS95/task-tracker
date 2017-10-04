<?php
include_once ROOT.'/models/Task.php';
class DeleteController
{
public function actionIndex($params = null)
{
$result = Task::delete($_GET['id']);
require_once(ROOT.'/views/edit_view.php');
return true;
}

}