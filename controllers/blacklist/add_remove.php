<?php 
require_once '../../models/blacklist/Blacklist.php';
require_once '../../models/database/Database.php';
require_once '../../models/user/User.php';

Database::initialise('localhost', 'root', '123456', 'ncut');
$blacklist = Blacklist::from(User::from($_SESSION['user_id']));

if(!empty($_POST['add_user'])) {
	$blacklist->add(user::find($_POST['add_user']));
}
if(!empty($_POST['remove_user'])) {
	$blacklist->remove(user::find($_POST['remove_user']));
}