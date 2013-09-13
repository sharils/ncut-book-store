<?php
require_once "models/user/User.php";
$resource = Router::resource();
$user = User::from($_SESSION['user_id']);
$role = $user->role();

require_once "views/welcome/above.php";
require_once "views/welcome/ul_top.php";
require_once "views/welcome/account.php";
require_once "views/welcome/ul_under.php";

switch ($resource) {
    case 'update':
        require_once "views/password_update.php";
        break;
    case 'modify':
        require_once "views/create_user/user_form.php";
        break;
    default:
        break;
}
// require_once "views/welcome/below.php";
