<?php
require_once "models/user/User.php";
require_once "models/database/Database.php";
require_once "models/publisher/Publisher.php";

Database::initialise('localhost', 'root', '123456', 'ncut');

if (in_array('', $_POST)) {
    $str = ($_POST['role'] === 'Publisher') ? "home/publisher/{$_POST['id']}" : "account/modify";
    $url = Notice::addTo('修改失敗：不允許空值存入！', $str);
    $url = Router::toUrl($url);
} else {
    switch ($_POST['role']) {
        case 'Clerk':
        case 'Student':
        case 'Teacher':
            $user = User::from($_POST['id']);
            $edit_role = $user->toRole();
            $edit_role->email($_POST['email']);
            $edit_role->update();
            $url = Router::toUrl("account/modify");
            break;
        case 'Publisher':
            $edit_role = Publisher::from($_POST['id']);
            $edit_role->email($_POST['email']);
            $edit_role->address($_POST['address']);
            $edit_role->person($_POST['person']);
            $edit_role->phone($_POST['phone']);
            $edit_role->phone_ext($_POST['phone_ext']);
            $edit_role->update();
            $url = Router::toUrl("home/publisher/{$_POST['id']}");
            break;
    }
}
Router::redirect($url);
