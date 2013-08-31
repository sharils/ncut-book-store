<?php
require_once "models/database/Database.php";
require_once "models/user/User.php";

session_start();
Database::initialise('localhost', 'root', '123456', 'ncut');

$pwd = $_POST;
try{
	if ($pwd['newpassword'] === $pwd['confirmpassword']){
		$user = User::from($_SESSION['User_id']);
		$user->changePassword($pwd['password'], $pwd['newpassword']);
	}else{
		echo '密碼輸入錯誤';
	}
}catch (Exception $e) {
	echo $e->getMessage();
}
