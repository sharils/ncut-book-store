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
            <th colspan="6">課程建立</th>
        </tr>
        <tr>
            <th>學年度</th>
            <td><input class="form-control" name="year" type="text" /></td>
            <th>學期</th>
            <td><?php Method::select('semester',Parameter::$semester); ?></td>
            <th>學制</th>
            <td><?php Method::select('system',Parameter::$system, 0); ?></td>
        </tr>
        <tr>
            <th>課程代碼</th>
            <td><input class="form-control" name="sn" type="text" /></td>
            <th>課程名稱</th>
            <td><input class="form-control" name="name" type="text" /></td>
            <th>必/選修</th>
            <td><?php Method::select('type',Parameter::$type); ?></td>
        </tr>
        <tr>
        <th colspan="2">授課教師</th>
            <td colspan="4"><?php Method::select('teacher_id',$args); ?></td>
        <tr>
            <th colspan="6">授課班級</th>
        </tr>
        </tr>
        <tr colspan="6">
            <th>科系</th>
            <td><?php Method::select('department',Parameter::$department, 0); ?></td>
            <th>年級</th>
            <td><?php Method::select('grade',Parameter::$grade, 0); ?></td>
            <th>班級</th>
            <td><?php Method::select('group',Parameter::$group); ?></td>
        </tr>
    </table>
    <div>
        <input class="btn btn-success" type="submit" value="送出"/>
    </div>
</form>
</div>
