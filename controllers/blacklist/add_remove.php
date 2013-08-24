<?php 
require_once '../../models/Blacklist.php';
require_once '../../models/Database.php';;
require_once '../../models/User.php';

Database::initialise('localhost', 'root', '123456', 'ncut');
// $rows = Blacklist::find(User::from($_SESSION['user_id']));
$blacklist = Blacklist::from(User::from('1377323782'));

if(!empty($_POST['add_user'])) {
	$blacklist->add(user::find($_POST['add_user']));
}
if(!empty($_POST['remove_user'])) {
	$blacklist->remove(user::find($_POST['remove_user']));
}