<?php
require_once "models/admin/Admin.php";
require_once "models/clerk/Clerk.php";
require_once "models/database/Database.php";
require_once "models/student/Student.php";
require_once "models/teacher/Teacher.php";
require_once "models/user/User.php";
Database::initialise('localhost', 'root', '123456', 'ncut');
if ($_POST['pwd'] === $_POST['confirmpassword']) {
	$args = $_POST;
	$admin = Admin::from(User::from($_SESSION['user_id']));
	if ($args['role'] === 'Teacher') {
		$admin->create_user(
			'Teacher',
			$args['pwd'],
			$args['sn'],
			$args['email'],
			$args['name'],
			$args['phone'],
			$args['phone_ext']
		);
	}

	if ($args['role'] === 'Student') {
		$admin->create_user(
			'Student',
			$args['pwd'],
			$args['sn'],
			$args['email'],
			$args['class'],
			$args['department'],
			$args['name'],
			$args['type'],
			$args['phone'],
			$args['year']
		);
	}

	if ($args['role'] === 'Clerk') {
		$admin->create_user(
			'Clerk',
			$args['pwd'],
			$args['sn'],
			$args['email'],
			$args['name'],
			$args['phone'],
			$args['phone_ext']
		);
	}
	$url = Router::toUrl('views/create_user/create_user.php');
	Router::redirect($url);
} else {
	echo 'Two Passwrods are different.';
}
