<?php
require_once 'controllers/teacher_course/teacher_courselisting.php';
?>
<div class ="col-lg-9 col-sm-9 center">
<table class="table table-bordered center">
    <tr class="active">
        <th><label>課程名稱</label></th>
        <th><label>必選修</label></th>
        <th><label>學年度</label></th>
    </tr>
    <?php foreach( $courses as $course ): ?>
        <tr>
            <td><a href="<?= Router::toUrl("home/course/{$course->id()}"); ?>"><?= htmlspecialchars($course->name()); ?></a></td>
            <td><?= $course->type(); ?></td>
            <td><?= $course->year(); ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</div>
