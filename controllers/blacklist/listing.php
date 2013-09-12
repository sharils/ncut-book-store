<?php
require_once 'models/blacklist/Blacklist.php';
require_once 'models/user/User.php';

$blacklist = Blacklist::from(User::from($_SESSION['user_id']));
$black_users = $blacklist->blackUsers();
$black_araay = array();

foreach ($black_users as $black_user) {
    $black_araay[] = $black_user->id();
}
