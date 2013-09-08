<?php require_once 'controllers/student_course/list.php'; ?>
<table>
	<tr>
		<th>課程代號</th>
		<th>課程名稱</th>
		<th>教師代號</th>
		<th>教師</th>
		<th>必/選修</th>
		<th>學年度</th>
	</tr>
	<?php if ($student_courses[0]->course() !== null): ?>
		<?php foreach ($student_courses as $student_course): ?>
			<tr>
				<td><?= $student_course->course()->sn() ?></td>
				<td><?= $student_course->course()->name() ?></td>
				<td><?= $student_course->course()->teacher()->sn() ?></td>
				<td><?= $student_course->course()->teacher()->name() ?></td>
				<td><?= $student_course->course()->type() ?></td>
				<td><?= $student_course->course()->year() ?></td>
			</tr>
		<?php endforeach; ?>
	<?php endif; ?>
</table>
<form action="<?= Router::toUrl('controllers/student_course/add_remove.php') ?>" method="post">
	<fieldset>
		<label>新增課程：<input name="add_course" type="text" /></label>
		<label>移除課程：<input name="remove_course" type="text" /></label>
		<input type="submit" value="送出"/>
	</fieldset>
</form>
