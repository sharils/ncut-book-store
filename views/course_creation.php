<?php 
require_once 'method.php';
$a = array('0000000000' => 't001'.'Sam', '2221888777' => 't003'.'Fan', '1377007736' => 't00123'.'Harry'); 
?>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
<form action="../controllers/course_creation.php" method="post">
	<label>老師</label><?php Method::select('teacher_id',$a); ?>
	<label>課程代碼<input name="sn" type="text" /></label>
	<label>課程名稱<input name="name" type="text" /></label>
	<label>必選修<input name="type" type="text" /></label>
	<label>學年度<input name="year" type="text" /></label>
	<input type="submit" value="送出"/>
</form>