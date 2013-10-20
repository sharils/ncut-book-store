<?php
require_once 'controllers/teacher_course/teacher_coursedetail.php';
?>
<div class ="col-9 center">
    <form action="<?= Router::toUrl("controllers/teacher_course/remove.php")?>" method="post">
        <div><input name="course" type="hidden" value="<?= $objcourse->id(); ?>"/></div>
        <table class="table center">
            <tr class="active">
                <th><label>書籍名稱</label></th>
                <th><label>版本</label></th>
                <th><label>ISBN</label></th>
                <th><label>作者</label></th>
                <th><label>功能</label></th>
            </tr>
            <?php foreach( $coursebooks as $coursebook ): ?>
                <tr>
                    <td><?= htmlspecialchars($coursebook->book()->name()); ?></td>
                    <td><?= htmlspecialchars($coursebook->book()->version()); ?></td>
                    <td><?= htmlspecialchars($coursebook->book()->isbn()); ?></td>
                    <td><?= htmlspecialchars($coursebook->book()->author()) ?></td>
                    <td>
                        <button class="btn btn-danger" name="remove_book" value="<?= htmlspecialchars($coursebook->book()->id()) ?>">刪除書籍</button>
                    </td>
                </tr>
             <?php endforeach; ?>
        </table>
        <p>
            <a class="btn btn-primary" name="add_book" href="<?= Router::toUrl("home/course_book/new/{$objcourse->id()}")?>">新增書籍</a>
            <a class="btn btn-primary" href="<?= Router::toUrl("home/course_book")?>">返回</a>
        </p>
    </form>
</div>
