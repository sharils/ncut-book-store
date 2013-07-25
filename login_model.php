<?php

function login_check($id,$pw){
	include "mysql_connect.inc.php" ;
	$sql = "SELECT * FROM `user` where user_id = $id and user_pwd = $pw ";
	$result = $db->prepare($sql);
	$result->execute();
	$row = $result->rowCount();
	return $row;
}

function read_roledata($id,$role){
	include "mysql_connect.inc.php" ;
	$sql = "SELECT * FROM $role where id = $id ";
    $result = $db->query($sql);
    $result->execute();
    $row =$result->fetchAll();
    return $row;
}

function get_role($id){
	include "mysql_connect.inc.php" ;
	$sql = "SELECT * FROM `user` where user_id = $id ";
    $result = $db->prepare($sql);
    $result->execute();
    $row =$result->fetch();
    return $row['user_role'];
}