<?php
require_once "models/database/Database.php";
require_once "models/user/User.php";
Database::initialise('localhost', 'root', '123456', 'ncut');

try{
	if ($_POST['newpassword'] === $_POST['confirmpassword']){
		$user = User::from($_SESSION['user_id']);
		$user->changePassword($_POST['password'], $_POST['newpassword']);
	}else{
		echo '密碼輸入錯誤';
	}
}catch (Exception $e) {
	echo $e->getMessage();
}
$url = Router::toUrl('account/update');
Router::redirect($url);
