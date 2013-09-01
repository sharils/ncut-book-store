<?php
require_once 'controllers/teacher_course/teacher_coursedetail.php';
?>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<form action="<?= Router::toUrl("controllers/teacher_course/add_remove.php")?>" method="post">
	<table>
		<tr>
			<th><label>書籍名稱</label></th>
			<th><label>版本</label></th>
			<th><label>ISBN</label></th>
			<th><label>作者</label></th>
		</tr>
		<input name="course" type="hidden" value="<?= $course->id(); ?>" />
		<?php foreach( $coursebooks as $coursebook ): ?>
			<tr>
				<td><?php echo $coursebook->book()->name(); ?></td>
				<td><?php echo $coursebook->book()->remark() ?></td>
				<td><?php echo $coursebook->book()->isbn(); ?></td>
				<td><?php echo $coursebook->book()->author() ?></td>
				<td><button name="remove_book" value="<?= $coursebook->book()->id() ?>">刪除書籍</button></label></td>
			</tr>
 		<?php endforeach; ?>
			<tr>
			<td><button name="add_book" value="<?= $coursebook->book()->id() ?>">新增書籍</button></td>
				<!-- <a href="../controllers/delete_coursebook.php?course-id=<?= $course->id();?> & book-id=<?= $coursebook->book()->id(); ?>" >刪除</a></label></td> -->
			</tr>
	</table>
</form>
