<?php
include_once ROOT.'/models/Task.php';
class PanelController
{
public function actionIndex(){
	
	session_start();
	
	if(isset($_POST['logout'])){
		
		session_destroy();
		header('Location: /main');
		

	}

$tasks = array();
if(isset($_POST['but'])){
$tasks = Task::sorting();
}else{
$tasks = array();
$tasks = Task::getListItemsAdmin();
}
require_once(ROOT.'/views/panel_view.php');

return true;
}
}