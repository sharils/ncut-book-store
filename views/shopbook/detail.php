<?php
require_once 'controllers/shopbook/detail.php';
require_once 'views/course/Method.php';
?>
<div class ="col-lg-9 col-sm-9">
    <form action="<?= Router::toUrl('controllers/shopbook/update.php')?>" method="post">
        <table class="center table table-bordered">
            <tr class="active">
                <th colspan="8">修改書籍資料</th>
            </tr>
            <tr>
                <th>書名</th>
                <td colspan="3">
                    <input name="id" type="hidden" value="<?= $book->id() ?>"/>
                    <input class="form-control" disabled name="name" type="text" value="<?= $book->name() ?>"/>
                </td>
                <th>版本</th>
                <td>
                    <input class="form-control" disabled name="version" type="text" value="<?= $book->version() ?>"/>
                </td>
                <th>作者</th>
                <td>
                    <input class="form-control" disabled name="author" type="text" value="<?= $book->author() ?>"/>
                </td>
            </tr>
            <tr>
                <th>ISBN</th>
                <td colspan="3">
                    <input class="form-control" disabled name="isbn" type="text" value="<?= $book->isbn() ?>"/>
                </td>
                <th>定價</th>
                <td>
                    <input class="form-control" name="market_price" type="text" value="<?= $book->marketPrice() ?>"/>
                </td>
                <th>售價</th>
                <td>
                    <input class="form-control" name="price" type="text" value="<?= $book->price() ?>"/>
                </td>
            </tr>
            <tr>
                <th>廠商</th>
                <td colspan="3">
                    <?= Method::select('publisher', $args, NULL, $book->publisher()->id()) ?>
                </td>
                <th>庫存</th>
                <td>
                    <input class="form-control" name="number" type="text" value="<?= $shopbook->number() ?>"/>
                </td>
                <th>狀態</th>
                <td>
                    <button class="btn <?= Parameter::$shelf[$shopbook->shelf()][1] ?>" name="shelf" value="<?= $shopbook->book()->id() ?>">
                        <?= Parameter::$shelf[$shopbook->shelf()][0] ?>
                    </button>
                </td>
            </tr>
            <tr>
                <th>備註</th>
                <td colspan="7">
                    <input class="form-control" name="remark" type="text" value="<?= $book->remark() ?>"/>
                </td>
            </tr>
        </table>
        <div>
            <input class="btn btn-warning" type="submit" value="修改"/>
        </div>
    </form>
    <hr>
    <table class="center table table-bordered">
        <tr class="active">
            <th colspan="5">使用此書課程的課程列表</th>
        </tr>
        <tr class="active">
            <th>學年</th>
            <th>班級</th>
            <th>必/選修</th>
            <th>課程名稱</th>
            <th>老師</th>
        </tr>
        <?php foreach($coursebooks as $coursebook): ?>
            <tr>
                <td><?=
                        $coursebook->course()->year().
                        Parameter::$semester[$coursebook->course()->semester()][1];
                    ?>
                </td>
                <td>
                    <?=
                        Parameter::$system[$coursebook->course()->system()][1].
                        Parameter::$department[$coursebook->course()->department()][1].
                        Parameter::$grade[$coursebook->course()->grade()][1].
                        Parameter::$group[$coursebook->course()->group()];
                    ?>
                </td>
                <td><?=Parameter::$type[$coursebook->course()->type()];?></td>
                <td><?=$coursebook->course()->name()?></td>
                <td><?=$coursebook->course()->teacher()->name()?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    </form>
</div>
