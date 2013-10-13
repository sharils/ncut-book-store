<?php
require_once 'models/announce/Announce.php';
require_once 'models/user/User.php';

$user = User::from($_SESSION['user_id']);
$role = $user->toRole();

$id = $_POST['id'];
$title = $_POST['title'];
$message = $_POST['message'];

if ($id === 'NULL') {
    Announce::create($role, $title, $message);
} else {
    $announce = Announce::from($id);
    $announce->user($role);
    $announce->title($title);
    $announce->message($message);
    $announce->update();
}

$url = Router::toUrl('home/announce');
Router::redirect($url);
