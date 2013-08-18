<?php
require_once "Database.php";
require_once "User.php";

session_start();
Database::initialise('localhost', 'root', '123456', 'ncut');

$pwd = $_POST;
try{
	if ($pwd['newpassword'] === $pwd['confirmpassword']){
		$user = User::form($_SESSION['User_id']);
		$user->changePassword($pwd['password'], $pwd['newpassword']);
	}else{
		echo '密碼輸入錯誤';
	}
}catch (Exception $e) {
	echo $e->getMessage();
}