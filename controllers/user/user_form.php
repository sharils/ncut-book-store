<?php
require_once "models/user/User.php";
require_once "models/publisher/Publisher.php";
require_once "controllers/user/create_form.php";

$role = Router::resource('0');
$resource = Router::resource('1');
$resource2 = Router::resource('2');
$account = FALSE;
$active = Create::$active;
$active[$role] = 'active';
$diff = ['status' => '新增', 'class' => 'btn-primary'];
$flag = [];
$id = NULL;


if ($role === 'modify'){
    $resource = $_SESSION['user_id'];
    $user = User::from($resource);
    $role = $user->role();
    $account = TRUE;
}

Create::$role();
$args = Create::$args;
if ($resource !== 'new') {
    switch ($role) {
        case 'clerk':
        case 'student':
        case 'teacher':
            unset($args['pwd'], $args['confirmpassword']);
            if ($resource2 === NULL) {
                $user = User::from($resource);
                $flag = ['sn', 'name', 'phone', 'phone_ext', 'class', 'department', 'year', 'type'];
            } else {
                $user = User::from($resource2);
                $flag = [];
            }
            $edit_role = $user->toRole();
            break;
        case 'publisher':
            $edit_role = Publisher::from($resource);
            $flag = ['name', 'account'];
            break;
        default:
            Router::notFound();
            break;
    }

    foreach ($args as $key => &$value) {
        if ($key === 'class') {
            $value[2] = $edit_role->type();
        } else if ($key !== 'role') {
            $value[2] = $edit_role->$key();
        }
    }
    unset($value);
    $id = $edit_role->id();
    $diff = ['status' => '修改', 'class' => 'btn-warning'];
}
