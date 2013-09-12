<?php
require_once 'models/course/Course.php';
require_once 'models/database/Database.php';
require_once 'models/teacher/Teacher.php';
require_once 'models/user/User.php';
Database::initialise('localhost', 'root', '123456', 'ncut');

if (in_array('', $_POST)) {
    $url = Notice::addTo('新增失敗：不允許空值存入！', 'home/course');
    $redirect_url = Router::toUrl($url);
    Router::redirect($redirect_url);
} else {
    $teacher = Teacher::from(User::from($_POST['teacher_id']));
    Course::create($teacher, $_POST['sn'], $_POST['type'], $_POST['name'], $_POST['year']);
    Router::redirect(Router::toUrl("home/course"));
}
