<?php
require_once 'Method.php';
require_once 'controllers/course/select_list.php';
?>
<form action="../../controllers/course/course_creation.php" method="post">
	<fieldset>
		<label>老師<?php Method::select('teacher_id',$args); ?></label>
		<label>課程代碼<input name="sn" type="text" /></label>
		<label>課程名稱<input name="name" type="text" /></label>
		<label>必選修<input name="type" type="text" /></label>
		<label>學年度<input name="year" type="text" /></label>
		<input type="submit" value="送出"/>
	</fieldset>
</form>
