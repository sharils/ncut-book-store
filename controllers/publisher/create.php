<?php
require_once 'models/database/Database.php';
require_once 'models/publisher/Publisher.php';
Database::initialise('localhost', 'root', '123456', 'ncut');
Publisher::create(
	$_POST['email'],
	$_POST['account'],
	$_POST['address'],
	$_POST['name'],
	$_POST['person'],
	$_POST['phone']
);

$url = Router::toUrl('views/publisher/create.php');
Router::redirect($url);