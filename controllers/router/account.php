<?php
$resource = Router::resource();
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
