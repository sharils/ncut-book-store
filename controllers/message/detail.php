<?php
require_once 'models/database/Database.php';
require_once 'models/message/Message.php';
Database::initialise('localhost', 'root', '123456', 'ncut');
$id = Router::resource();
$message = Message::from($id);

