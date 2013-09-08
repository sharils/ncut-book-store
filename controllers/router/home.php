<?php
require_once "views/welcome/home.php";
require_once "views/welcome/above.php";
require_once "views/welcome/ul_top.php";

switch ($_SESSION['role']) {
	case 'admin':
		require_once "views/welcome/admin.php";
		break;
	case 'clerk':
		require_once "views/welcome/clerk.php";
		break;
	case 'student':
		require_once "views/welcome/student.php";
		break;
	case 'teacher':
		require_once "views/welcome/teacher.php";
		break;
	default:
		return Router::notFound();
		break;
}
require_once "views/welcome/ul_under.php";
$resource = Router::resource();
$resource1 = Router::resource(0);
$resource2 = Router::resource(1);
switch ($_SESSION['role']) {
	case 'admin':
		if ($resource === 'course') {
			require_once "views/course/course_creation.php";
		}
		if ($resource === 'clerk/new') {
			require_once "views/create_user/create_clerk.php ";
		}
		if ($resource === 'student/new') {
			require_once "views/create_user/create_student.php";
		}
		if ($resource === 'teacher/new') {
			require_once "views/create_user/create_teacher.php ";
		}
	case 'student':
		if ($resource === 'order' && $resource2 === NULL) {
			require_once "views/student_order/listing.php";
			break;
		}
		if ($resource1 === 'order' && $resource2 === 'ok' ) {
			require_once "views/student_order/confirmation.php";
			break;
		}
		if ($resource === 'order/cart') {
			require_once "views/student_order/cart.php";
			break;
		}
		if ($resource1 === 'order' && $resource2 != NULL ) {
			require_once "views/student_order/detail.php";
		}
	case 'teacher':
		if ($resource === 'course_book') {
			require_once "views/teacher_course/teacher_courselisting.php";
		}
		if ($resource2 === 'new') {
			require_once "views/teacher_course/add_coursebook.php";
		}
		if ($resource1 === 'course') {
			require_once "views/teacher_course/teacher_coursedetail.php";
		}
		break;
		default:
			return Router::notFound();
			break;
}
