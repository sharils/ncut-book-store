<?php
require_once 'models/database/Database.php';
require_once 'models/publisher/Publisher.php';
Database::initialise('localhost', 'root', '123456', 'ncut');
if ($_POST['id'] == NULL) {
    Publisher::create(
        $_POST['email'],
        $_POST['account'],
        $_POST['address'],
        $_POST['name'],
        $_POST['person'],
        $_POST['phone'],
        $_POST['phone_ext']
    );
    $url = Router::toUrl('home/publisher/new');
} else {
    $publisher = Publisher::from($_POST['id']);
    $publisher->email($_POST['email']);
    $publisher->address($_POST['address']);
    $publisher->person($_POST['person']);
    $publisher->phone($_POST['phone']);
    $publisher->phone_ext($_POST['phone_ext']);
    $publisher->update();
    $url = Router::toUrl("home/publisher/{$_POST['id']}");
}
Router::redirect($url);


