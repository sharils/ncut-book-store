<?php
require_once 'models/course/Course.php';
require_once 'models/teacher/Teacher.php';
require_once 'models/user/User.php';

$id = $_POST['id'];
unset($_POST['id']);
$status = ($id === '') ? '新增' : '修改';
if (in_array('', $_POST)) {
    $url = Notice::addTo("{$status}失敗：不允許空值存入！", 'home/course');
    $url = Router::toUrl($url);
} else {

    $teacher = Teacher::from(User::from($_POST['teacher_id']));
    if($id === '') {
        Course::create($teacher, $_POST['sn'], $_POST['type'], $_POST['department'], $_POST['grade'], $_POST['group'], $_POST['name'], $_POST['system'], $_POST['semester'], $_POST['year']);
        $url = Router::toUrl("home/course");
    } else {
        $course = Course::from($id);
        $post = $_POST;
        unset($post['id'],$post['teacher_id']);

        foreach ($post as $k => $v) {
            $course->$k($v);
        }
        $course->teacher($teacher);
        $course->update();
        $url = Notice::addTo('success', "home/course/{$id}");
        $url = Router::toUrl($url);
    }

}

Router::redirect($url);
