<?php
require_once 'controllers/user/create_form.php';
require_once 'models/clerk/Clerk.php';
require_once 'models/teacher/Teacher.php';
require_once 'models/student/Student.php';
require_once 'models/user/User.php';

$user = User::from($_SESSION['user_id']);
$user_role =$user->role();

$role = Router::resource('0');
$B_role = ucfirst($role);

$active[$role] = 'active';

$rows = $B_role::find();
Create::$role();

$args = Create::$args;
$drop = ['department', 'group', 'system'];
unset($args['pwd'],$args['confirmpassword']);
