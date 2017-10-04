<?php
class Task
{
public static function connect(){
    $name = '';
    $password = '';
    $db = new PDO('mysql:dbname=tasks;host = 127.0.0.1', $name, $password);
    return $db;
}

public static function edit($id)
{
$db = Task::connect();
if(isset($_POST['but']))
{
$text = trim($_POST['message']);
$task = $db->prepare("UPDATE user_task SET text = '$text' WHERE id = '$id'");
$task->execute();
header('Location: /panel');
}
if(isset($_GET['id'])){
$id = $_GET['id'];
$task = $db->prepare("SELECT text FROM user_task WHERE id = '$id'");
$task->execute();
$result = $task->fetchColumn();
return $result;
}
return 0;
}
public static function deleteItem($id)
{
$db = new PDO('mysql:dbname=tasks;host = 127.0.0.1', 'root', 'dima95');

}
public static function getListItemsPagination()
{
$db = Task::connect();
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 3;
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

$tasks = $db->prepare("SELECT * FROM user_task LIMIT {$start}, {$perPage}");
$tasks->execute();
$tasks = $tasks->fetchAll(PDO::FETCH_ASSOC);
return $tasks;
}


public static function pagination()
{
$db = Task::connect();
$query=$db->query("SELECT COUNT(*) as count FROM user_task");
$perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 3;

$query->setFetchMode(PDO::FETCH_ASSOC);
$row=$query->fetch();
$total=$row['count'];
$pages = ceil($total/$perPage);
return $pages;
}


public static function getListItemsAdmin()
	{
	
$db = Task::connect();
		
$checking = $db->prepare("SELECT SQL_CALC_FOUND_ROWS id, name,email,text,image,isDone FROM user_task ");
$checking->execute();
if(isset($_POST['b']) && isset($_POST['check'])){
$checkbox = $_POST['check'];
foreach($checkbox as $check){
$checking = $db->prepare("UPDATE user_task SET isDone = 1 WHERE id = '$check'");
$checking->execute();
}
}

$tasks = $db->prepare("SELECT SQL_CALC_FOUND_ROWS id, name,email,text,image,isDone FROM user_task ");
$tasks->execute();
$tasks = $tasks->fetchAll(PDO::FETCH_ASSOC);
return $tasks;
}
public static function sorting()
{
$db = Task::connect();

if($_POST['sort'] == 'namesort'){
$tasks = $db->prepare("SELECT id,name,email,text,image FROM user_task ORDER BY name");
$tasks->execute();
$tasks = $tasks->fetchAll(PDO::FETCH_ASSOC);
return $tasks;
}
else if($_POST['sort'] == 'emailsort'){
$tasks = $db->prepare("SELECT id,name,email,text,image FROM user_task ORDER BY email");
$tasks->execute();
$tasks = $tasks->fetchAll(PDO::FETCH_ASSOC);
return $tasks;

}
else if($_POST['sort'] == 'none'){
$tasks = $db->prepare("SELECT id,name,email,text,image FROM user_task");
$tasks->execute();
$tasks = $tasks->fetchAll(PDO::FETCH_ASSOC);
return $tasks;
}

}
public static function get_data(){

if (!empty($_FILES)) {
   
    include(ROOT.'/models/class.upload_0.32.php');
    $handle = new upload($_FILES['upfile']);
    if ($handle->uploaded) {
    
		
		$ext = pathinfo($_FILES["upfile"]["name"]);
		
        $handle->file_new_name_body = basename($_FILES["upfile"]["name"], '.'.$ext['extension']);
        
        $handle->image_resize = true;
      
        $handle->image_x = 320;
		$handle->image_y = 240;
     
        $handle->process($_SERVER['DOCUMENT_ROOT'].'/upload/');
        if ($handle->processed) {
            $handle->clean();
        } else {
            echo 'error : ' . $handle->error;
        }
    }
}





$db = new PDO('mysql:host = 127.0.0.1;dbname=tasks', 'root', 'dima95');
if(isset($_POST["but"])){
$name = $_POST["name"];
$email = $_POST["email"];
$text = $_POST["message"];
$upfile_name = $_FILES["upfile"]["name"];
$isDone = 0;
$dir = './upload/';
$upfile_name = $dir.$upfile_name;
$sql= "INSERT INTO user_task(name,email,text,image,isDone) VALUES(:name, :email, :text, :image, :isDone)";
$query = $db->prepare($sql);
return $query->execute(array(
':name' => $name,
':email' => $email,
':text' => $text,
':image' => $upfile_name,
':isDone' => $isDone
));

}

}

public static function delete($id)
{
$db = new PDO('mysql:dbname=tasks;host = 127.0.0.1', 'root', 'dima95');
$tasks = $db->prepare("DELETE FROM user_task WHERE id = '$id'");
$tasks->execute();
header('Location: /panel');
}

}
