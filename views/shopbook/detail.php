<?php
require_once 'controllers/shopbook/detail.php';
require_once 'views/course/Method.php';
?>
<div class ="col-9 center">
    <form action="<?= Router::toUrl('controllers/shopbook/update.php')?>" method="post">
        <table class="table center">
            <tr class="active">
                <th colspan="6">修改書籍資料</th>
            </tr>
            <tr>
                <th>書名</th>
                <td>
                    <input name="id" type="hidden" value="<?= $book->id() ?>"/>
                    <input class="form-control" disabled name="name" type="text" value="<?= htmlspecialchars($book->name()) ?>"/>
                </td>
                <th>版本</th>
                <td>
                    <input class="form-control" disabled name="version" type="text" value="<?= htmlspecialchars($book->version()) ?>"/>
                </td>
                <th>作者</th>
                <td>
                    <input class="form-control" disabled name="author" type="text" value="<?= htmlspecialchars($book->author()) ?>"/>
                </td>
            </tr>
            <tr>
                <th>ISBN</th>
                <td>
                    <input class="form-control" disabled name="isbn" type="text" value="<?= htmlspecialchars($book->isbn()) ?>"/>
                </td>
                <th>定價</th>
                <td>
                    <input class="form-control" name="market_price" type="text" value="<?= htmlspecialchars($book->marketPrice()) ?>"/>
                </td>
                <th>售價</th>
                <td>
                    <input class="form-control" name="price" type="text" value="<?= htmlspecialchars($book->price()) ?>"/>
                </td>
            </tr>
            <tr>
                <th>廠商</th>
                <td>
                    <?= Method::select('publisher', $args, NULL, htmlspecialchars($book->publisher()->id())) ?>
                </td>
                <th>庫存</th>
                <td>
                    <input class="form-control" name="number" type="text" value="<?= htmlspecialchars($shopbook->number()) ?>"/>
                </td>
                <th>狀態</th>
                <td>
                    <button class="btn <?= Parameter::$shelf[$shopbook->shelf()][1] ?>" name="shelf" value="<?= htmlspecialchars($shopbook->book()->id()) ?>">
                        <?= htmlspecialchars(Parameter::$shelf[$shopbook->shelf()][0]) ?>
                    </button>
                    <button class="btn btn-danger" name="delete" value="">刪除</button>
                </td>
            </tr>
            <tr>
                <th>備註</th>
                <td colspan="7">
                    <input class="form-control" name="remark" type="text" value="<?= htmlspecialchars($book->remark()) ?>"/>
                </td>
            </tr>
        </table>
        <div>
            <input class="btn btn-warning" type="submit" value="修改"/>

            <a class="btn btn-default" href="<?= Router::toUrl("home/shop_book/")?>">返回</a>

        </div>
    </form>
    <hr>
    <table class="table center">
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
                <td><?= htmlspecialchars(Parameter::$type[$coursebook->course()->type()]); ?></td>
                <td><?= htmlspecialchars($coursebook->course()->name()) ?></td>
                <td><?= htmlspecialchars($coursebook->course()->teacher()->name()) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    </form>
</div>
