<?php
require_once "models/user/User.php";
require_once "models/publisher/Publisher.php";
require_once "controllers/user/create_form.php";

$post_role = strtolower($_POST['role']);
$user = User::from($_SESSION['user_id']);
$role = $user->role();

if (in_array('', $_POST)) {

    if ($_POST['role'] === 'Publisher') {
        $str = "home/publisher/{$_POST['id']}";
    } else if ($role === 'admin'){
        $str = "home/{$post_role}/modify/{$_POST['id']}";
    } else {
        $str = "account/modify";
    }
    $url = Notice::addTo('修改失敗：不允許空值存入！', $str);
    $url = Router::toUrl($url);

} else if ($role === 'admin') {
    $user = User::from($_POST['id']);
    $user_role = $user->toRole();
    Create::$post_role();
    $args = Create::$args;
    unset($args['pwd'], $args['confirmpassword']);
    foreach ($args as $k => $v) {
        $user_role->$k($_POST[$k]);
    }
    $user_role->update();
    $url = Router::toUrl("home/{$post_role}/list");
} else {
    switch ($_POST['role']) {
        case 'Admin':
        case 'Clerk':
        case 'Student':
        case 'Teacher':
            $user_role = $user->toRole();
            $user_role->email($_POST['email']);
            $user_role->update();
            $url = Router::toUrl("account/modify");
            break;
        case 'Publisher':
            $edit_role = Publisher::from($_POST['id']);
            $edit_role->email($_POST['email']);
            $edit_role->address($_POST['address']);
            $edit_role->person($_POST['person']);
            $edit_role->phone($_POST['phone']);
            $edit_role->fax($_POST['fax']);
            $edit_role->account($_POST['account']);
            $edit_role->update();
            $url = Router::toUrl("home/publisher/{$_POST['id']}");
            break;
    }
}

Router::redirect($url);
