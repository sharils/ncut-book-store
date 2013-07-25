<?php session_start(); ?>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
<?php
	
	include "login_model.php";

	$id = $_POST['user_id'];
	$pw = $_POST['user_pwd']; 
	$role = get_role($id);
	$row = login_check($id,$pw);

	if($row > 0){
		$_SESSION['user_id'] = $id;
		$_SESSION['user_role'] = $role;
    	echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
	}else{
    	echo '登入失敗!';
    	echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
	}
	

