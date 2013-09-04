<?php
require_once 'models/database/Database.php';
require_once 'models/message/Message.php';
Database::initialise('localhost', 'root', '123456', 'ncut');
$message = Message::from($_POST['id']);
$message->delete();

$url = Router::toUrl('views/message/list.php?page=receive');
Router::redirect($url);