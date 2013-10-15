<?php
require_once 'controllers/search/student.php';
require_once 'views/course/Method.php';
?>
<div class ="col-lg-9 col-sm-9 center">
    <table class="center table table-bordered">
        <form action="<?= Router::toUrl('controllers/search/add_carts.php'); ?>" method="post">
        <tr class="active">
            <th>學年</th>
            <th>班級</th>
            <th>課程名稱</th>
            <th>老師</th>
            <th>書名(版本)</th>
            <th>作者</th>
            <th>ISBN</th>
            <th>出版社</th>
            <th>定價</th>
            <th>售價</th>
            <th><label class="btn btn-default">全選</label></th>
        </tr>
            <div><input name="page" type="hidden" value="<?=$page?>"/></div>
            <?php foreach($course_books as $coursebook): ?>
                <tr>
                    <th>
                        <?=
                            htmlspecialchars(
                                $coursebook->course()->year().
                                Parameter::$semester[$coursebook->course()->semester()][1]
                            );
                        ?>
                    </th>
                    <th>
                        <?=
                            htmlspecialchars(
                                Parameter::$system[$coursebook->course()->system()][1].
                                Parameter::$department[$coursebook->course()->department()][1].
                                Parameter::$grade[$coursebook->course()->grade()][1].
                                Parameter::$group[$coursebook->course()->group()]
                            );
                        ?>
                    </th>
                    <th><?= htmlspecialchars($coursebook->course()->name()) ?></th>
                    <th><?= htmlspecialchars($coursebook->course()->teacher()->name()) ?></th>
                    <th><?= htmlspecialchars($coursebook->book()->name() .'('.$coursebook->book()->version().')') ?></th>
                    <th><?= htmlspecialchars($coursebook->book()->author()) ?></th>
                    <th><?= htmlspecialchars($coursebook->book()->isbn()) ?></th>
                    <th><?= htmlspecialchars($coursebook->book()->publisher()->name()) ?></th>
                    <th><?= htmlspecialchars($coursebook->book()->marketprice()) ?></th>
                    <th><?= htmlspecialchars($coursebook->book()->price()) ?></th>
                    <th>
                        <input  name="book_id[]" type="checkbox" value="<?= $coursebook->book()->id() ?>"/>
                    </th>
                </tr>
            <?php endforeach; ?>
        </table>
        <input class="btn btn-warning" type="submit" value="放入購物車">
   </form>
</div>
