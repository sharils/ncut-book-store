<?php
require_once 'controllers/teacher_course/add.php';
require_once 'controllers/teacher_course/select_list.php';
require_once 'views/course/Method.php';
?>
<div class ="col-lg-9 col-sm-9 center">
<?php if (null !== Notice::get()): ?>
    <div class="alert alert-danger"><?=Notice::get()?></div>
<?php endif; ?>
<form action="<?= Router::toUrl("controllers/teacher_course/add.php")?>" method="post">
    <div><input name="course" type="hidden" value="<?= $course->id(); ?>"/></div>
    <table class="table table-bordered center">
        <tr class="active">
            <th colspan="6">教科用書登記表</th>
        <tr>
            <th>課程名稱</th>
            <td><?= $course->name(); ?></td>
            <th>必選修</th>
            <td><?= $course->type(); ?></td>
            <th>學制</th>
            <td><?= $course->year(); ?></td>
        </tr>
        <tr>
            <th>書籍名稱</th>
            <td><input class="form-control" type="text" name="name"/></td>
            <th>版本</th>
            <td><input class="form-control" type="text" name="version"/></td>
            <th>書號/ISBN</th>
            <td><input class="form-control" type="text" name="isbn"/></td>
        </tr>
        <tr>
            <th>作者</th>
            <td><input class="form-control" type="text" name="auther"/></td>
            <th>出版社/代理商</th>
            <td><?php Method::select('publisher',$args); ?></td>
            <th>上課班級</th>
            <td><input class="form-control" type="text" name="class"/></td>
        </tr>
        <tr>
            <td colspan="6"><label  class="checkbox-inline">
                <input  class="checkbox-inline" type="checkbox" name="sample" value="true">需要樣書</label>
            </td>
        </tr>
        <tr>
            <th>備註</th>
            <td colspan="5"><textarea class="form-control" rows="3" cols="20" name="remark"></textarea></td>
        </tr>
    </table>
    <p><button class="btn btn-primary" type="submit" name="add_book" value="">新增書籍</button></p>
</form>
</div>
