<?php require_once 'controllers/shopbook/list.php'; ?>
<div class ="col-lg-9 col-sm-9">
    <ul class="nav nav-tabs">
        <li class="<?= $active[''] ?>"><a href="<?= Router::toUrl('home/shop_book/')?>">全部</a></li>
        <li class="<?= $active['on'] ?>"><a href="<?= Router::toUrl('home/shop_book/on')?>">上架</a></li>
        <li class="<?= $active['off'] ?>"><a href="<?= Router::toUrl('home/shop_book/off')?>">下架</a></li>
    </ul>
   <form action="<?= Router::toUrl('controllers/shopbook/change_shelf.php'); ?>" method="post">
        <table class="center table table-bordered">
            <tr class="active">
                <th>ISBN</th>
                <th>書名</th>
                <th>版本</th>
                <th>種類</th>
                <th>作者</th>
                <th>出版社</th>
                <th>原價</th>
                <th>售價</th>
                <th>數量</th>
                <th>狀態</th>
                <th>功能</th>
            </tr>
            <?php foreach($shopbooks as $shopbook): ?>
                <tr>
                    <td><?= $shopbook->book()->isbn() ?></td>
                    <td><?= $shopbook->book()->name() ?></td>
                    <td><?= $shopbook->book()->version() ?></td>
                    <td><?= $shopbook->book()->type() ?></td>
                    <td><?= $shopbook->book()->author() ?></td>
                    <td><?= $shopbook->book()->publisher()->name() ?></td>
                    <td><?= $shopbook->book()->marketPrice() ?></td>
                    <td><?= $shopbook->book()->price() ?></td>
                    <td><?= $shopbook->number() ?></td>
                    <td>
                        <button class="btn <?= Parameter::$shelf[$shopbook->shelf()][1] ?>" name="shelf" value="<?= $shopbook->book()->id() ?>">
                            <?= Parameter::$shelf[$shopbook->shelf()][0] ?>
                        </button>
                    </td>
                    <td>
                        <a class="btn btn-warning" href="<?= Router::toUrl("home/book/{$shopbook->book()->id()}")?>">修改書籍</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </form>
</div>
