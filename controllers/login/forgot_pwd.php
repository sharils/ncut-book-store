<?php
require_once 'models/user/User.php';
$user = User::find($_POST['sn']);

if ($user === NULL) {
    $url = Notice::addTo('查無此帳號！', 'forgot');
    $redirect_url = Router::toUrl($url);
    Router::redirect($redirect_url);
}

$role_user = $user->toRole();
if ($role_user->email() === $_POST['email']){
    $rand = time();
    $user->resetPassword($rand);
    require_once 'controllers/login/send_pwd.php';
    $url = Router::toUrl('forgot');
} else {
    $url = Notice::addTo('此信箱並不是當初驗證的信箱！', 'forgot');
    $url = Router::toUrl($url);
}
Router::redirect($url);
