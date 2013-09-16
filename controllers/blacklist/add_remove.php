<?php
require_once 'models/blacklist/Blacklist.php';
require_once 'models/user/User.php';

$blacklist = Blacklist::from(User::from($_SESSION['user_id']));

if(isset($_POST['add_user'])) {
    $blacklist->add(user::find($_POST['add_user']));
}
if(isset($_POST['remove_user'])) {
    $blacklist->remove(user::find($_POST['remove_user']));
}
$url = Router::toUrl("message/blacklist");
Router::redirect($url);
