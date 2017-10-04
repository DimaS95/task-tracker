<?php
include_once(ROOT.'/models/Admin.php');
class AdminController{
public function actionIndex($params = null)
{
	session_start();
	if(isset($_SESSION['admin'])) {
		header('Location: /panel');
}
Admin::login();
session_start();
require_once(ROOT.'/views/admin_view.php');


return true;
}
}