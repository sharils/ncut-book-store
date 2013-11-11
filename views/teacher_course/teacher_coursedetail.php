<?php
require_once 'controllers/teacher_course/teacher_coursedetail.php';
?>
<div class ="col-9 center">
    <form action="<?= Router::toUrl("controllers/teacher_course/remove.php")?>" method="post">
        <div><input name="course" type="hidden" value="<?= $objcourse->id(); ?>"/></div>
        <table class="table center">
            <tr>
                <th colspan="5">課程用書</th>
            </tr>
            <tr>
                <th>班級</th>
                <td>
                    <?=
                        htmlspecialchars(
                            Parameter::$system[$objcourse->system()][1].
                            Parameter::$department[$objcourse->department()][1].
                            Parameter::$grade[$objcourse->grade()][1].
                            Parameter::$group[$objcourse->group()]
                        );
                    ?>
                </td>
                <th>課程</th>
                <td colspan="2"><?= htmlspecialchars($objcourse->name()); ?></td>
            </tr>
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
                        <a class="btn btn-warning" href="<?= Router::toUrl("home/course_book/{$coursebook->book()->id()}/{$coursebook->course()->id()}")?>">修改</a>
                        <button class="btn btn-danger" name="remove_book" value="<?= htmlspecialchars($coursebook->book()->id()) ?>">刪除</button>
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
<script>
$(function(){
    $('.btn-danger').on('click',function(){
        if(confirm("您確定刪除此筆資料嗎?"))
        {
            return true;
        }else{
            return false;
        }
    });
});
</script>
