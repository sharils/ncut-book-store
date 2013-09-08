<?php
require_once "views/welcome/home.php";
$resource = Router::resource();
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
// switch ($_SESSION['role']) {
// 	case 'admin':
// 		if ($resource === 'course') {
// 			require_once "views/course/course_creation.php";
// 		}
// 		if ($resource === 'clerk/new') {
// 			require_once "views/create_user/create_clerk.php ";
// 		}
// 		if ($resource === 'student/new') {
// 			require_once "views/create_user/create_student.php";
// 		}
// 		if ($resource === 'teacher/new') {
// 			require_once "views/create_user/create_teacher.php ";
// 		}
// 		break;
// 		default:
// 			return Router::notFound();
// 			break;
// }

?>