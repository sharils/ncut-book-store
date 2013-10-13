<?php
require_once 'controllers/teacher_course/teacher_courselisting.php';
?>
<div class ="col-lg-9 col-sm-9 center">
<table class="table table-bordered center">
    <tr class="active">
        <th><label>學年度</label></th>
        <th><label>班級</label></th>
        <th><label>課程名稱</label></th>
        <th><label>必選修</label></th>
    </tr>
    <?php foreach( $courses as $course ): ?>
        <tr>
            <td>
                <?=
                    htmlspecialchars(
                        $course->year().
                        Parameter::$semester[$course->semester()][1]
                    );
                ?>
            </td>
            <td>
                <?=
                    htmlspecialchars(
                        Parameter::$system[$course->system()][1].
                        Parameter::$department[$course->department()][1].
                        Parameter::$grade[$course->grade()][1].
                        Parameter::$group[$course->group()]
                    );
                ?>
            </td>
            <td><a href="<?= Router::toUrl("home/course/{$course->id()}"); ?>"><?= htmlspecialchars($course->name()); ?></a></td>
            <td><?= htmlspecialchars(Parameter::$type[$course->type()]) ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</div>
