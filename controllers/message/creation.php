<?php
require_once '../../models/database/Database.php';
require_once '../../models/message/Message.php';
require_once '../../models/user/User.php';
session_start();
Database::initialise('localhost', 'root', '123456', 'ncut');
$Sender = User::from($_SESSION['user_id']);
$Receiver = User::find($_POST['receiver']);
$m = Message::create($Sender, $Receiver, $_POST['content']);