<?php
require_once 'Method.php';
require_once 'controllers/course/select_list.php';
?>
<div class ="col-lg-9 col-sm-9">
<?php if (null !== Notice::get()): ?>
    <div class="alert alert-danger"><?=Notice::get()?></div>
<?php endif; ?>
<form action="<?= Router::toUrl("controllers/course/course_creation.php")?>" method="post">
    <table class="center table table-bordered">
        <tr class="active">
            <th colspan="4">課程建立</th>
        </tr>
        <tr>
            <th colspan="1">老師</th>
            <td colspan="3"><?php Method::select('teacher_id',$args); ?></td>
        </tr>
        <tr>
            <th>課程代碼</th>
            <td><input class="form-control" name="sn" type="text" /></td>
            <th>課程名稱</th>
            <td><input class="form-control" name="name" type="text" /></td>
        </tr>
        <tr>
            <th>必選修</th>
            <td><input class="form-control" name="type" type="text" /></td>
            <th>學年度</th>
            <td><input class="form-control" name="year" type="text" /></td>
        </tr>
    </table>
    <div>
        <input class="btn btn-success" type="submit" value="送出"/>
    </div>
</form>
</div>
