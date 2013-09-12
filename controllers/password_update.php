<?php
require_once "models/user/User.php";

try{
    if ($_POST['newpassword'] === $_POST['confirmpassword']){
        $user = User::from($_SESSION['user_id']);
        $user->changePassword($_POST['password'], $_POST['newpassword']);
        $redirect_url = Router::toUrl('account/update');
    }else{
        $url = Notice::addTo('修改失敗：新密碼不一致！', 'account/update');
        $redirect_url = Router::toUrl($url);
    }
}catch (Exception $e) {
    $url = Notice::addTo($e->getMessage(),'account/update');
    $redirect_url = Router::toUrl($url);
}

Router::redirect($redirect_url);
