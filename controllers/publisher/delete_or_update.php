<?php
require_once 'models/database/Database.php';
require_once 'models/publisher/Publisher.php';
Database::initialise('localhost', 'root', '123456', 'ncut');

if(isset($_POST['delete'])) {
    $publisher = Publisher::from($_POST['delete']);
    $publisher->delete();
    $url = Router::toUrl('home/publisher');
}

if(isset($_POST['update'])) {
    $url = Router::toUrl("home/publisher/{$_POST['update']}");
}
Router::redirect($url);
