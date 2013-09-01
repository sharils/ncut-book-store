<?php
require_once 'models/database/Database.php';
require_once 'models/user/User.php';
session_start();

Database::initialise('localhost', 'root', '123456', 'ncut');
try {
	$args = $_POST;
	$user = User::authenticate($args['user_name'], $args['role'], $args['password']);
	$_SESSION['user_id'] = $user->id();
	$_SESSION['role'] = $args['role'];
	Router::redirect('views/welcome/welcome.php');
	exit;
} catch (Exception $e) {
	echo $e->getMessage();
}
