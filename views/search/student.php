<?php
require_once 'controllers/search/student.php';
require_once 'views/course/Method.php';
?>
<div class ="col-9 center">
    <table class="table center">
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
            <th><label class="btn btn-default" name="allclick">全選</label>
            </th>
        </tr>
            <div><input name="page" type="hidden" value="<?=$page?>"/></div>
            <?php foreach($course_books as $coursebook): ?>
                <tr>
                    <td>
                        <?=
                            htmlspecialchars(
                                $coursebook->course()->year().
                                Parameter::$semester[$coursebook->course()->semester()][1]
                            );
                        ?>
                    </td>
                    <td>
                        <?=
                            htmlspecialchars(
                                Parameter::$system[$coursebook->course()->system()][1].
                                Parameter::$department[$coursebook->course()->department()][1].
                                Parameter::$grade[$coursebook->course()->grade()][1].
                                Parameter::$group[$coursebook->course()->group()]
                            );
                        ?>
                    </td>
                    <td><?= htmlspecialchars($coursebook->course()->name()) ?></td>
                    <td><?= htmlspecialchars($coursebook->course()->teacher()->name()) ?></td>
                    <td><?= htmlspecialchars($coursebook->book()->name() .'('.$coursebook->book()->version().')') ?></td>
                    <td><?= htmlspecialchars($coursebook->book()->author()) ?></td>
                    <td><?= htmlspecialchars($coursebook->book()->isbn()) ?></td>
                    <td><?= htmlspecialchars($coursebook->book()->publisher()->name()) ?></td>
                    <td><?= htmlspecialchars($coursebook->book()->marketprice()) ?></td>
                    <td><?= htmlspecialchars($coursebook->book()->price()) ?></td>
                    <td>
                        <input class="allClick" name="book_id[]" type="checkbox" value="<?= $coursebook->book()->id() ?>"/>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <input class="btn btn-warning" type="submit" value="放入購物車">
   </form>
</div>

<script>
$(function(){
    $('label[name=allclick]').on('click',function(){
        if($('.allClick').attr("checked")){
            $('.allClick').removeAttr("checked");
        }else{
            $('.allClick').attr("checked","true");
        };
    });

});
</script>
