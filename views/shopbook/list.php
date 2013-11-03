<?php require_once 'controllers/shopbook/list.php'; ?>
<div class ="col-9 center">
    <ul class="nav nav-tabs">
        <li class="<?= $active[''] ?>"><a href="<?= Router::toUrl('home/shop_book/')?>">全部</a></li>
        <li class="<?= $active['on'] ?>"><a href="<?= Router::toUrl('home/shop_book/on')?>">上架</a></li>
        <li class="<?= $active['off'] ?>"><a href="<?= Router::toUrl('home/shop_book/off')?>">下架</a></li>
    </ul>
   <form action="<?= Router::toUrl('controllers/shopbook/change_shelf.php'); ?>" method="post">
        <table class="table center">
            <tr class="active">
                <th rowspan="2" width="7%">出版社</th>
                <th rowspan="2">ISBN</th>
                <th rowspan="2">書名</th>
                <th rowspan="2">版本</th>
                <th rowspan="2">作者</th>
                <th rowspan="2">原價</th>
                <th rowspan="2">售價</th>
                <th rowspan="2">庫存量</th>
                <th colspan="2">需求量</th>
                <th rowspan="2">狀態</th>
                <th rowspan="2">功能</th>
            </tr>
            <tr class="active">
                <th>學生</th>
                <th>老師</th>
            </tr>
            <?php foreach($shopbooks as $shopbook): ?>
                <tr>
                    <td><?= htmlspecialchars($shopbook->book()->publisher()->name()) ?></td>
                    <td><?= htmlspecialchars($shopbook->book()->isbn()) ?></td>
                    <td><?= htmlspecialchars($shopbook->book()->name()) ?></td>
                    <td><?= htmlspecialchars($shopbook->book()->version()) ?></td>
                    <td><?= htmlspecialchars($shopbook->book()->author()) ?></td>
                    <td><?= htmlspecialchars($shopbook->book()->marketPrice()) ?></td>
                    <td><?= htmlspecialchars($shopbook->book()->price()) ?></td>
                    <td><?= htmlspecialchars($shopbook->number()) ?></td>
                    <td><?= htmlspecialchars($shopbook->book()->getStudentNeed()) ?></td>
                    <td><?= htmlspecialchars($shopbook->book()->getTeacherNeed()) ?></td>
                    <td>
                        <button class="btn <?= Parameter::$shelf[$shopbook->shelf()][1] ?>" name="shelf" value="<?= htmlspecialchars($shopbook->book()->id()) ?>">
                            <?= htmlspecialchars(Parameter::$shelf[$shopbook->shelf()][0]) ?>
                        </button>
                    </td>
                    <td>
                        <a class="btn btn-warning" href="<?= Router::toUrl("home/book/{$shopbook->book()->id()}")?>">修改書籍</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </form>
    <?php Page::getPage()?>
</div>
