<?php
require_once 'controllers/teacher_courselisting.php';
?>
<table>
	<tr>
		<th><label>課程名稱</label></th>
		<th><label>必選修</label></th>
		<th><label>學年度</label></th>
	</tr>
	<?php foreach( $courses as $course ): ?>
		<tr>
			<td><a href="<?= Router::toUrl("views/teacher_course/teacher_coursedetail.php?course-id={$course->id()}"); ?>"><?php echo $course->name(); ?></a></td>
			<td><?php echo $course->type(); ?></td>
			<td><?php echo $course->year(); ?></td>
		</tr>
	<?php endforeach; ?>
</table>
