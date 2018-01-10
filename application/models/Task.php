<?php



namespace application\models;

include(ROOT.'/models/class.upload_0.32.php');
include(ROOT . '/core/Model.php');

use PDO;
use upload;

class Task extends Model
{

public static function edit($id,$text)
{
    $db = self::connect();
    $task = $db->prepare("UPDATE user_task SET text = '$text' WHERE id = '$id'");
    $task->execute();
    header('Location: /panel');
}

public static function getText($id)
{
    $db = self::connect();
    $task = $db->prepare("SELECT text FROM user_task WHERE id = '$id'");
    $task->execute();
    $result = $task->fetchColumn();
    return $result; 
}

public static function getTasks($start, $perPage)
{
    $db = self::connect();
    $tasks = $db->prepare("SELECT * FROM user_task LIMIT {$start}, {$perPage}");
    $tasks->execute();
    $tasks = $tasks->fetchAll(PDO::FETCH_ASSOC);
    return $tasks;
}


public static function pagination($perPage)
{
    $db = self::connect();
    $query = $db->query("SELECT COUNT(*) as count FROM user_task");
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $row=$query->fetch();
    $total=$row['count'];
    $pages = ceil($total/$perPage);
    return $pages;
}


public static function getCheckedTasks($params)
    {
    
    $db = self::connect();
            
    $checking = $db->prepare("SELECT SQL_CALC_FOUND_ROWS FROM user_task");
    $checking->execute();

    $checkbox = $params['check'];
    foreach($checkbox as $check){
    $checking = $db->prepare("UPDATE user_task SET isDone = 1 WHERE id = '$check'");
    $checking->execute();
    }
    

    $tasks = $db->prepare("SELECT SQL_CALC_FOUND_ROWS id, name,email,text,image,isDone FROM user_task ");
    $tasks->execute();
    $tasks = $tasks->fetchAll(PDO::FETCH_ASSOC);
    return $tasks;
}

public static function sortedTasks($params)
{

    $db = self::connect();
    
    $sort = $params['sort'];
   
    
    $tasks = $db->prepare("SELECT * FROM user_task ORDER BY $sort");
    //print_r($db->prepare("SELECT * FROM user_task ORDER BY $sort"));
   
    $tasks->execute();
    $tasks = $tasks->fetchAll(PDO::FETCH_ASSOC);
    return $tasks;
}

public static function getAllTasks()
{
    $db = self::connect();
    $tasks = $db->prepare("SELECT * FROM user_task");
    $tasks->execute();
    $tasks = $tasks->fetchAll(PDO::FETCH_ASSOC);
    return $tasks;
}

public static function save($params, $files) 
{
    $db = self::connect();

    if (!empty($files)) {
       
       self::getImage($files);
    }

    $name = $params["name"];
    $email = $params["email"];
    $text = $params["message"];
    $upfile_name = $files["upfile"]["name"];
    $dir = './upload/';
    $upfile_name = $dir.$upfile_name;
    $sql= "INSERT INTO user_task(name,email,text,image) VALUES(:name, :email, :text, :image)";

    $query = $db->prepare($sql);

    return $query->execute(array(
    ':name' => $name,
    ':email' => $email,
    ':text' => $text,
    ':image' => $upfile_name
    ));

}



public static function delete($id)
{
    $db = new PDO('mysql:dbname=tasks;host = 127.0.0.1', 'root', '');
    $tasks = $db->prepare("DELETE FROM user_task WHERE id = '$id'");
    $tasks->execute();
    header('Location: /panel');
}

private static function getImage($files)
{

        $handle = new upload($files['upfile']);
        if ($handle->uploaded) {
        
            
            $ext = pathinfo($files["upfile"]["name"]);
            
            $handle->file_new_name_body = basename($files["upfile"]["name"], '.'.$ext['extension']);
            
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

}
