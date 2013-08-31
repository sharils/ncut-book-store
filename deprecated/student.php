<?php session_start(); ?>

<HTML>
	<HEAD>
	<TITLE>學生基本資料</TITLE>
	<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
</HEAD>
<BODY>
<?php
include("login_model.php");

/*透過ID,ROLE找相關人的資料*/
if($_SESSION['user_id'] != null){
	$id = $_SESSION['user_id'];
	$role = $_SESSION['user_role'];
	$rows = read_roledata($id,$role);
	print_r($rows); // 找的到資料不會輸出:(((,
}else{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
}
?>

</BODY>
</HTML>
