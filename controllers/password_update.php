<?php
require_once "User.php";
session_start();
Database::initialise('localhost', 'root', '123456', 'ncut');

$pwd = $_POST;
User::changePassword($pwd['password'], $pwd['newpassword']);
if ($pwd['newpassword'] === $pwd['confirmpassword']){
	echo '密碼更新成功';
}else{
	echo '密碼輸入錯誤';
}