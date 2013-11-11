<?php
require_once 'controllers/teacher_course/page_modify.php';
require_once 'controllers/teacher_course/select_list.php';
require_once 'views/course/Method.php';
?>
<div class ="col-9 center">
<?php if (null !== Notice::get()): ?>
    <div class="alert alert-danger"><?=Notice::get()?></div>
<?php endif; ?>
<form action="<?= Router::toUrl("controllers/teacher_course/modify.php")?>" method="post">
    <div>
        <input name="course" type="hidden" value="<?= $course->id(); ?>"/>
        <input name="book" type="hidden" value="<?= $cb['id']; ?>"/>
    </div>
    <table class="table center">
        <tr class="active">
            <th colspan="6">教科用書登記表</th>
        <tr>
            <th width="9%">課程名稱</th>
            <td><?= htmlspecialchars($course->name()); ?></td>
            <th width="9%">必選修</th>
            <td><?= htmlspecialchars(Parameter::$type[$course->type()]); ?></td>
            <th width="9%">學年度</th>
            <td><?= htmlspecialchars(
                    $course->year().
                    Parameter::$semester[$course->semester()][1]
                ); ?>
            </td>
        </tr>
        <tr>
            <th>書籍名稱</th>
            <td><input class="form-control" type="text" name="name" value="<?= $cb['name']?>"/></td>
            <th>版本</th>
            <td><input class="form-control" type="text" name="version" value="<?= $cb['version']?>"/></td>
            <th>書號/ISBN</th>
            <td><input class="form-control" type="text" name="isbn" value="<?= $cb['isbn']?>"/></td>
        </tr>
        <tr>
            <th>作者</th>
            <td><input class="form-control" type="text" name="author" value="<?= $cb['author']?>"/></td>
            <th>出版社/代理商</th>
            <td><?php Method::select('publisher',$args); ?></td>
            <th>上課班級</th>
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
        </tr>
        <tr>
            <td colspan="6"><label  class="checkbox-inline">
                <input  class="checkbox-inline" type="checkbox" name="sample" value="true" <?=$cb['sample']?>>需要樣書</label>
            </td>
        </tr>
        <tr>
            <th>備註</th>
            <td colspan="5"><textarea class="form-control" rows="3" cols="20" name="remark"><?= $cb['remark']?></textarea></td>
        </tr>
    </table>
    <p>
        <input class="btn btn-primary" type="submit" value="送出"/>
        <a class="btn btn-primary" href="<?= Router::toUrl("home/course/{$course->id()}")?>">返回</a>
    </p>
    <table class="table center">
        <tr class="active">
            <th colspan="6">歷史書單</th>
        </tr>
        <tr>
            <th><label>功能</label></th>
            <th><label>課程名稱</label></th>
            <th><label>書籍名稱</label></th>
            <th><label>出版社</label></th>
            <th><label>版本</label></th>
            <th><label>作者</label></th>
        </tr>
        <?php foreach($historybooks as $historybook): ?>
            <tr>
            </label>
                <td>
                    <input name="<?= htmlspecialchars($historybook->book()->id()); ?>" type="hidden" value="<?= htmlspecialchars($historybook->course()->id()); ?>"/>
                    <button class="btn btn-success" name="history" value="<?= htmlspecialchars($historybook->book()->id()); ?>">新增</button>
                    <button class="btn btn-danger" name="delete" value="<?= htmlspecialchars($historybook->book()->id()); ?>">刪除</button>
                </td>
                <td><label><?= htmlspecialchars($historybook->course()->name()); ?></label></td>
                <td><label><?= htmlspecialchars($historybook->book()->name()); ?></label></td>
                <td><label><?= htmlspecialchars($historybook->book()->publisher()->name()); ?></label></td>
                <td><label><?= htmlspecialchars($historybook->book()->version()); ?></label></td>
                <td><label><?= htmlspecialchars($historybook->book()->author()); ?></label></td>
            </tr>
        <?php endforeach; ?>
    </table>
</form>
</div>
