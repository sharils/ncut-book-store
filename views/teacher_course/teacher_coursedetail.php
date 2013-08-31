<?php
require_once '../controllers/teacher_coursedetail.php';
?>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<form action="" method="post">
	<table>
		<tr>
			<th><label>書籍名稱</label></th>		
			<th><label>版本</label></th>
			<th><label>ISBN</label></th>
			<th><label>作者</label></th>		
		</tr>
		<?php foreach( $coursebooks as $coursebook ): ?>
			<tr>
				<td><?php echo $coursebook->book()->name(); ?></td>
				<td><?php echo $coursebook->book()->remark() ?></td>
				<td><?php echo $coursebook->book()->isbn(); ?></td>
				<td><?php echo $coursebook->book()->author() ?></td>
				<td><label><a href="../controllers/delete_coursebook.php?course-id=<?= $course->id();?> & book-id=<?= $coursebook->book()->id(); ?>" >刪除</a></label></td>
			</tr>
 		<?php endforeach; ?>
			<tr>
			<td><label><input name="AddBook" type="submit" value="新增書籍"></label></td>
			</tr>
	</table>
</form>