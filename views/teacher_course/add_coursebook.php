<?php
require_once 'controllers/teacher_course/add_remove.php';
?>
<div class ="col-lg-9 col-sm-9 center">
<form action="controllers/teacher_course/add_remove" method="post">
	<table class="table table-bordered center">
		<tr class="active">
			<th colspan="6">教科用書登記表</th>
		<tr>
			<th>課程名稱</th>
			<td><?= $_GET['name'] ?></td>
			<th>必選修</th>
			<td><?= $_GET['type'] ?></td>
			<th>學制</th>
			<td><?= $_GET['year'] ?></td>
		</tr>
		<tr>
			<th>書籍名稱</th>
			<td><input class="form-control" type="text" name="bookname"/></td>
			<th>版本</th>
			<td><input class="form-control" type="text" name="version"/></td>
			<th>書號/ISBN</th>
			<td><input class="form-control" type="text" name="isbn"/></td>
		<tr>
			<th>作者</th>
			<td><input class="form-control" type="text" name="auther"/></td>
			<th>出版社/代理商</th>
			<td><input class="form-control" type="text" name="publisher"/></td>
			<th>上課班級</th>
			<td><input class="form-control" type="text" name="classr"/></td>
		<tr>
			<th>備註</th>
			<td colspan="5"><textarea class="form-control" rows="3" cols="20" name="remark"></textarea></td>
		</tr>
	</table>
	<p><button class="btn btn-primary" name="add_book" value="">新增書籍</button></p>
</form>
</div>