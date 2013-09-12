<?php
require_once 'models/user/User.php';

try {
    $user = User::authenticate(
        $_POST['user_name'],
        $_POST['role'],
        $_POST['password']
    );
    $_SESSION['user_id'] = $user->id();
    $url = Router::toUrl('home');
    Router::redirect($url);
    exit;
} catch (Exception $e) {
    $url = Notice::addTo($e->getMessage(), '');
    $redirect_url = Router::toUrl($url);
    Router::redirect($redirect_url);
}
