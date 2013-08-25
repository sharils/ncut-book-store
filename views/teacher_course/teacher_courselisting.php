<?php
require_once '../controllers/teacher_courselisting.php';
?>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<table>
	<tr>
		<th><label>課程名稱</label></th>
		<th><label>必選修</label></th>
		<th><label>學年度</label></th>
	</tr>
	<?php foreach( $courses as $course ): ?>
		<tr>
			<td><a href="teacher_coursedetail.php?course-id=<?= $course->id(); ?>"><?php echo $course->name(); ?></a></td>
			<td><?php echo $course->type(); ?></td>
			<td><?php echo $course->year(); ?></td>
		</tr>
	<?php endforeach; ?>
</table>