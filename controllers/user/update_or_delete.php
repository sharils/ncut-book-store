<?php
require_once "models/admin/Admin.php";
require_once "models/clerk/Clerk.php";
require_once "models/student/Student.php";
require_once "models/teacher/Teacher.php";
require_once "models/user/User.php";

if(isset($_POST['delete'])) {
    $user = User::from($_POST['delete']);
    $role = $user->role();
    $user_role = $role::from($user);
    $user_role->delete();
    $url = Router::toUrl("home/{$role}/list");
}
if(isset($_POST['update'])) {
    $user = User::from($_POST['update']);
    $role = $user->role();
    $url = Router::toUrl("home/{$role}/modify/{$_POST['update']}");
}
Router::redirect($url);
