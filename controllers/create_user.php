<?php 
require_once '../models/Admin.php';
require_once "../models/Clerk.php";
require_once "../models/Database.php";
require_once "../models/Student.php";
require_once "../models/Teacher.php";
require_once "../models/User.php";
Database::initialise('localhost', 'root', '123456', 'ncut');

if ($_POST['pwd'] === $_POST['confirmpassword']) {
	$args = $_POST;
	$admin = Admin::from(User::from('6666666666'));

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
	echo '<meta http-equiv=REFRESH CONTENT=2;url=../views/create_user/create_user.php>';
} else {
	echo 'Two Passwrods are different.';
}