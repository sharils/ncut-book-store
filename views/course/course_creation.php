<?php 
require_once 'Method.php';
require_once '../controllers/select_list.php'; 
?>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<form action="../controllers/course_creation.php" method="post">
	<fieldset>
		<label>老師<?php Method::select('teacher_id',$args); ?></label>
		<label>課程代碼<input name="sn" type="text" /></label>
		<label>課程名稱<input name="name" type="text" /></label>
		<label>必選修<input name="type" type="text" /></label>
		<label>學年度<input name="year" type="text" /></label>
		<input type="submit" value="送出"/>
	</fieldset>
</form>