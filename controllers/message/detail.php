<?php
require_once 'models/message/Message.php';
$id = Router::resource();
$message = Message::from($id);

