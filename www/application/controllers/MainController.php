<?php
include_once ROOT.'/models/Task.php';
class MainController
{
public function actionIndex($params = null)
{
$tasks = array();
$tasks = Task::getListItemsPagination();

$pages = Task::pagination();

require_once(ROOT.'/views/mainPage_view.php');
return true;
}

} 