<?php
require_once 'models/database/Database.php';
require_once 'models/message/Message.php';
require_once 'models/user/User.php';

Database::initialise('localhost', 'root', '123456', 'ncut');
if (in_array('', $_POST)) {
    $url = Notice::addTo('送出失敗：不允許空值！','message/new');
    $url = Router::toUrl($url);
} else {
    $Sender = User::from($_SESSION['user_id']);
    $Receiver = User::find($_POST['receiver']);
    $m = Message::create($Sender, $Receiver, $_POST['content']);
    $url = Router::toUrl('message/new');
}
Router::redirect($url);

