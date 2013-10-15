<?php
require_once "models/user/User.php";
require_once "views/welcome/home.php";
require_once "views/welcome/above.php";
require_once "views/welcome/ul_top.php";

$user = User::from($_SESSION['user_id']);
$role = $user->role();

$resource = Router::resource();
$resource1 = Router::resource('0');
$resource2 = Router::resource('1');
$resource3 = Router::resource('2');

switch ($role) {
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
switch ($role) {
    case 'admin':
        if ($resource === 'course') {
            require_once "views/course/course_creation.php";
            break;
        }
        if ($resource === 'course/list') {
            require_once "views/course/list.php";
            break;
        }
        if ($resource2 === 'new' || $resource2 === 'modify') {
            require_once "views/create_user/user_form.php";
            break;
        }
        if ($resource2 === 'list') {
            require_once "views/create_user/list.php";
            break;
        }
    case 'clerk':
        if ($resource === 'announce') {
            require_once "views/announce/list.php";
            break;
        }
        if ($resource === 'announce/new' OR $resource1 === 'announce') {
            require_once "views/announce/modify.php";
            break;
        }
        if ($resource === 'publisher/new') {
            require_once "views/create_user/user_form.php";
            break;
        }
        if ($resource === 'publisher' && $resource2 === NULL) {
            require_once "views/publisher/list.php";
            break;
        }
        if ($resource1 === 'publisher') {
            require_once "views/create_user/user_form.php";
            break;
        }
        if ($resource1 === 'shop_book') {
            require_once "views/shopbook/list.php";
            break;
        }
        if ($resource2 === 'list') {
            require_once "views/create_user/list.php";
            break;
        }
        if ($resource2 === 'search') {
            require_once "views/search/list.php";
            break;
        }
        if ($resource1 === 'book') {
            require_once "views/shopbook/detail.php";
            break;
        }
        if ($resource1 === 'order' && $resource2 !== NULL && $resource3 === NULL) {
            require_once "views/clerk/order_list.php";
            break;
        }
        if ($resource1 === 'order' && $resource3 !== NULL) {
            require_once "views/clerk/order_detail.php";
            break;
        }
        break;
    case 'student':
        if ($resource === 'order' && $resource2 === NULL) {
            require_once "views/student_order/listing.php";
            break;
        }
        if ($resource1 === 'order' && $resource2 === 'ok') {
            require_once "views/student_order/confirmation.php";
            break;
        }
        if ($resource === 'order/cart') {
            require_once "views/student_order/cart.php";
            break;
        }
        if ($resource1 === 'order' && $resource2 != NULL) {
            require_once "views/student_order/detail.php";
            break;
        }
        if ($resource2 === 'search') {
            require_once "views/search/list.php";
            break;
        }
        require_once "views/search/student.php";
        break;
    case 'teacher':
        if ($resource === 'course_book') {
            require_once "views/teacher_course/teacher_courselisting.php";
            break;
        }
        if ($resource === NULL) {
            require_once "views/teacher_course/notice.php";
            break;
        }
        if ($resource2 === 'new') {
            require_once "views/teacher_course/add_coursebook.php";
            break;
        }
        if ($resource1 === 'course') {
            require_once "views/teacher_course/teacher_coursedetail.php";
            break;
        }
        break;
    default:
        return Router::notFound();
        break;

}
