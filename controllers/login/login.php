<?php
require_once 'models/database/Database.php';
require_once 'models/user/User.php';

Database::initialise('localhost', 'root', '123456', 'ncut');
try {
	$user = User::authenticate(
		$_POST['user_name'],
		$_POST['role'],
		$_POST['password']
	);
	$_SESSION['user_id'] = $user->id();
	$_SESSION['role'] = $_POST['role'];
	$url = Router::toUrl('home');
	Router::redirect($url);
	exit;
} catch (Exception $e) {
	echo $e->getMessage();
}
