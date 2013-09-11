<?php
require_once "models/user/User.php";
require_once "models/database/Database.php";
require_once "models/publisher/Publisher.php";
require_once "controllers/user/create_form.php";

Database::initialise('localhost', 'root', '123456', 'ncut');

$role = Router::resource('0');
$resource = Router::resource('1');

if ($role === 'modify'){
    $resource = $_SESSION['user_id'];
    $user = User::from($resource);
    $role = $user->role();
}

Create::$role();
$args = Create::$args;
$id = NULL;
$diff = ['status' => '新增', 'class' => 'btn-primary'];
$flag = [];

if ($resource !== 'new') {
    switch ($role) {
        case 'clerk':
        case 'student':
        case 'teacher':
            unset($args['pwd']);
            unset($args['confirmpassword']);
            $role = ucfirst($role);
            $user = User::from($resource);
            $edit_role = $user->toRole();
            $flag = ['sn', 'name', 'phone', 'phone_ext', 'class', 'department', 'year', 'type'];
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
            $value[2] = $edit_role->team();
        } elseif  ($key !== 'role') {
            $value[2] = $edit_role->$key();
        }
    }
    unset($value);
    $id = $edit_role->id();
    $diff = ['status' => '修改', 'class' => 'btn-warning'];
}
