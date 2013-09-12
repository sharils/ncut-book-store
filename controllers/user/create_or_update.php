<?php
require_once "models/admin/Admin.php";
require_once "models/clerk/Clerk.php";
require_once "models/student/Student.php";
require_once "models/teacher/Teacher.php";
require_once 'models/publisher/Publisher.php';
require_once "models/user/User.php";

if ($_POST['id'] === '') {
    require_once 'controllers/user/create.php';
} else {
    require_once 'controllers/user/update.php';
}
