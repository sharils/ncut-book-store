<?php require_once 'controllers/course/list.php';?>
<div class ="col-lg-9 col-sm-9 center">
    <?php if (null !== Notice::get()): ?>
        <div class="alert alert-danger"><?=Notice::get()?></div>
    <?php endif; ?>
    <form action="<?= Router::toUrl('controllers/course/delete.php') ?>"  method="post">
        <table class="table table-bordered center">
            <tr>
                <th><label>學年度</label></th>
                <th><label>課程代碼</label></th>
                <th><label>課程名稱</label></th>
                <th><label>班級</label></th>
                <th><label>必選修</label></th>
                <th><label>老師</label></th>
                <th></th>
            </tr>
            <?php foreach ($courses as $course): ?>
                <tr>
                    <td>
                        <?=
                            htmlspecialchars(
                                $course->year().
                                Parameter::$semester[$course->semester()][1]
                            );
                        ?>
                    </td>
                    <td><?= htmlspecialchars($course->sn());?></td>
                    <td><?= htmlspecialchars($course->name());?></td>
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
                    <td><?= htmlspecialchars(Parameter::$type[$course->type()]);?></td>
                    <td><?= htmlspecialchars($course->teacher()->name());?></td>
                    <td>
                        <button class="btn btn-danger" name="remove_course" value="<?= htmlspecialchars($course->id()) ?>">
                            刪除
                        </button>
                    </td>
                <tr>
            <?php endforeach; ?>
        </table>
    </form>
</div>
