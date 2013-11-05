<?php
require_once 'controllers/course/modify.php';
require_once 'Method.php';
require_once 'controllers/course/select_list.php';
?>
<div class ="col-9 center">
<?php if (null !== Notice::get()): ?>
    <div class="alert alert-danger"><?=Notice::get()?></div>
<?php endif; ?>
<form action="<?= Router::toUrl("controllers/course/course_creation.php")?>" method="post">
    <input name="id" type="hidden" value="<?= $course['id']?>"/>
    <table class="table center">
        <tr class="active">
            <th colspan="6">課程建立</th>
        </tr>
        <tr>
            <th>學年度</th>
            <td><input class="form-control" name="year" type="text" value="<?= $course['year']?>"/></td>
            <th>學期</th>
            <td><?php Method::select('semester', Parameter::$semester, 0, $course['semester']); ?></td>
            <th>學制</th>
            <td><?php Method::select('system', Parameter::$system, 0, $course['system']); ?></td>
        </tr>
        <tr>
            <th>課程代碼</th>
            <td><input class="form-control" name="sn" type="text" value="<?= $course['sn']?>"/></td>
            <th>課程名稱</th>
            <td><input class="form-control" name="name" type="text" value="<?= $course['name']?>"/></td>
            <th>必/選修</th>
            <td><?php Method::select('type', Parameter::$type, NULL, $course['type']); ?></td>
        </tr>
        <tr>
            <th colspan="3">授課教師</th>
            <td colspan="3"><?php Method::select('teacher_id', $args, NULL, $course['teacher']); ?></td>
        <tr>
            <th colspan="6">授課班級</th>
        </tr>
        </tr>
        <tr colspan="6">
            <th>科系</th>
            <td><?php Method::select('department', Parameter::$department, 0, $course['department']); ?></td>
            <th>年級</th>
            <td><?php Method::select('grade', Parameter::$grade, 0, $course['grade']); ?></td>
            <th>班級</th>
            <td><?php Method::select('group', Parameter::$group, NULL, $course['group']); ?></td>
        </tr>
    </table>
    <div>
        <input class="btn btn-success" type="submit" value="送出"/>
    </div>
</form>
</div>
