<?php
$resource = Router::resource();

require_once "views/welcome/above.php";
require_once "views/welcome/ul_top.php";
require_once "views/welcome/message.php";
require_once "views/welcome/ul_under.php";

switch ($resource) {
    case 'blacklist':
        require_once "views/blacklist/blacklist.php";
        break;
    case 'new':
        require_once "views/message/creation.php";
        break;
    case 'received':
    case 'sent':
    case 'spam':
        require_once "views/message/list.php";
        break;
    default:
        require_once "views/message/detail.php";
}
// require_once "views/welcome/below.php";
