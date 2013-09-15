<?php
$role = strtolower($_POST['role']);

unset($_POST['id']);
if (in_array('', $_POST)) {
    $url = Notice::addTo('新增失敗：不允許空值存入！', "home/{$role}/new");
    $url = Router::toUrl($url);
} else if ($_POST['role'] === 'Publisher') {
    Publisher::create(
        $_POST['email'],
        $_POST['account'],
        $_POST['address'],
        $_POST['name'],
        $_POST['person'],
        $_POST['phone'],
        $_POST['phone_ext']
    );
    $url = Router::toUrl('home/publisher/new');
} else if ($_POST['pwd'] === $_POST['confirmpassword']) {
    $admin = Admin::from(User::from($_SESSION['user_id']));
    if ($_POST['role'] === 'Teacher') {
        $admin->create_user(
            'Teacher',
            $_POST['pwd'],
            $_POST['sn'],
            $_POST['email'],
            $_POST['name'],
            $_POST['phone'],
            $_POST['phone_ext']
        );
    }

    if ($_POST['role'] === 'Student') {
        $admin->create_user(
            'Student',
            $_POST['pwd'],
            $_POST['sn'],
            $_POST['email'],
            $_POST['group'],
            $_POST['department'],
            $_POST['name'],
            $_POST['system'],
            $_POST['phone'],
            $_POST['year']
        );
    }

    if ($_POST['role'] === 'Clerk') {
        $admin->create_user(
            'Clerk',
            $_POST['pwd'],
            $_POST['sn'],
            $_POST['email'],
            $_POST['name'],
            $_POST['phone'],
            $_POST['phone_ext']
        );
    }
    $url = Router::toUrl("home/{$role}/new");
} else {
    $url = Notice::addTo('新增失敗：密碼輸入不一致！',"home/{$role}/new");
    $url = Router::toUrl($url);
}

Router::redirect($url);
