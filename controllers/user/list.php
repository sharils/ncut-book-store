<?php
require_once 'controllers/user/create_form.php';
require_once 'models/clerk/Clerk.php';
require_once 'models/teacher/Teacher.php';
require_once 'models/student/Student.php';


$role = Router::resource('0');
$B_role = ucfirst($role);

$active[$role] = 'active';

$rows = $B_role::find();
Create::$role();

$args = Create::$args;
unset($args['pwd'],$args['confirmpassword']);
