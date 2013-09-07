<?php
require_once 'controllers/teacher_course/teacher_coursedetail.php';
?>
<div class ="col-lg-9 col-sm-9 center">
<form action="<?= Router::toUrl("controllers/teacher_course/add_remove.php")?>" method="post">
	<p><input name="course" type="hidden" value="<?= $course->id(); ?>"/></p>
	<table class="table table-bordered center">
		<tr class="active">
			<th><label>書籍名稱</label></th>
			<th><label>版本</label></th>
			<th><label>ISBN</label></th>
			<th><label>作者</label></th>
			<th><label>功能</label></th>
		</tr>
		<?php foreach( $coursebooks as $coursebook ): ?>
			<tr>
				<td><?= $coursebook->book()->name(); ?></td>
				<td><?= $coursebook->book()->remark() ?></td>
				<td><?= $coursebook->book()->isbn(); ?></td>
				<td><?= $coursebook->book()->author() ?></td>
				<td><button class="btn btn-danger" name="remove_book" value="<?= $coursebook->book()->id() ?>">刪除書籍</button></td>
			</tr>
 		<?php endforeach; ?>
	</table>
	<p><a class="btn btn-primary" name="add_book" href="<?= Router::toUrl("home/course_book/new{$course->id()}")?>">新增書籍</a></p>
</form>
</div>
