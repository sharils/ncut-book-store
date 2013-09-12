<?php
require_once 'models/user/User.php';
$user = User::from($_SESSION['user_id']);
Welcome::newSelf($user->role());
