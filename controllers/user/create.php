<?php
if ($_POST['role'] === 'Publisher') {
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
    Router::redirect($url);
} else if ($_POST['pwd'] === $_POST['confirmpassword']) {
    $args = $_POST;
    $admin = Admin::from(User::from($_SESSION['user_id']));
    if ($args['role'] === 'Teacher') {
        $admin->create_user(
            'Teacher',
            $args['pwd'],
            $args['sn'],
            $args['email'],
            $args['name'],
            $args['phone'],
            $args['phone_ext']
        );
    }

    if ($args['role'] === 'Student') {
        $admin->create_user(
            'Student',
            $args['pwd'],
            $args['sn'],
            $args['email'],
            $args['class'],
            $args['department'],
            $args['name'],
            $args['type'],
            $args['phone'],
            $args['year']
        );
    }

    if ($args['role'] === 'Clerk') {
        $admin->create_user(
            'Clerk',
            $args['pwd'],
            $args['sn'],
            $args['email'],
            $args['name'],
            $args['phone'],
            $args['phone_ext']
        );
    }
    $role = strtolower($args['role']);
    $url = Router::toUrl("home/{$role}/new");
    Router::redirect($url);
} else {
    echo 'Two Passwrods are different.';
}
