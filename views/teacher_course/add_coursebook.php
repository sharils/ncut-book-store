<?php
require_once 'controllers/teacher_course/add_remove.php';
?>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<form action="" type="get">
	<table>
		<caption>教科用書登記表</caption>
			<tr>
				<th>課程名稱</th>
				<td><?php echo $_GET['name'] ?></td>
				<th>必選修</th>
				<td><?php echo $_GET['type'] ?></td>
				<th>學制</th>
				<td><?php echo $_GET['year'] ?></td>
			</tr>
		<tr>
			<th>書籍名稱</th>
			<td><input type="text" name="bookname"/></td>
			<th>版本</th>
			<td><input type="text" name="version"/></td>
			<th>書號/ISBN</th>
			<td><input type="text" name="isbn"/></td>
		<tr>
			<th>作者</th>
			<td><input type="text" name="auther"/></td>
			<th>出版社/代理商</th>
			<td><input type="text" name="publisher"/></td>
			<th>上課班級</th>
			<td><input type="text" name="classr"/></td>
		<tr>
			<th>備註</th>
			<td><textarea rows="3" cols="20" name="remark">預設訊息</textarea></td>
		</tr>
	</table>
</form>