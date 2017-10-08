<?php
class Admin
{
public static function connect()
{
	$name = '';
    $password = '';
    $dbc = mysqli_connect("localhost", $name, $password , "tasks");
    return $dbc;
}
public static function login(){

$dbc = Admin::connect();
if(isset($_POST["login"]) && isset($_POST["password"])){
$login = mysqli_real_escape_string($dbc, trim($_POST['login']));
$password = mysqli_real_escape_string($dbc, trim($_POST['password']));
$query = "SELECT `login`,`pass` FROM `admin` WHERE login = '$login' AND pass = '$password'";
$datas = mysqli_query($dbc, $query);
if(mysqli_num_rows($datas) == 1 && !empty($login) && !empty($password)){
	$_SESSION['admin'] = $login;
header("Location:/panel/");
mysqli_close($dbc);
}
else{
echo "access_denied";
}
}
}
}
