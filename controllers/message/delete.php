<?php
require_once 'models/message/Message.php';
$message = Message::from($_POST['id']);
$message->delete();

$url = Router::toUrl('message/received');
Router::redirect($url);
