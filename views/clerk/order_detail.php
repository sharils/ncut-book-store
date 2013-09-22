<?php
require_once 'controllers/course/select_list.php';
require_once 'controllers/clerk/order_detail.php';
require_once 'views/course/Method.php';
?>
<div class ="col-xs-6 col-md-4 col-lg-9 col-sm-9 center">
<form action="<?= Router::toUrl("controllers/clerk/clerk_update.php")?>" method="post">
    <div><input name="course" type="hidden" value="<?= $order->id(); ?>"/></div>
    <table class="table table-bordered center">
        <tr class="active">
            <th>訂單編號</th>
            <th>書籍名稱</th>
            <th>版本</th>
            <th>ISBN</th>
            <th>數量</th>
            <th>單價</th>
            <th>訂單狀態</th>
        </tr>
        <?php foreach( $orderdetails as $orderdetail ): ?>
            <tr>
                <td><?= $orderdetail->id(); ?></td>
                <td><?= $orderdetail->book()->name(); ?></td>
                <td><?= $orderdetail->book()->isbn(); ?></td>
                <td><?= $orderdetail->book()->version() ?></td>
                <td><?= $orderdetail->number(); ?></td>
                <td><?= $orderdetail->book()->price(); ?></td>
                <td><?php Method::select('status',Parameter::$status); ?></td>
            </tr>
    <?php endforeach; ?>
         <tfoot class="active">
            <td align="right" colspan="6">總金額</td>
            <td align="right" colspan="1">NT$ <?= $total; ?></td>
        </tfoot>
    </table>
    <div>
        <a class="btn btn-info" name="update" href="<?= Router::toUrl("home/order/{$order->status()}"); ?>">上一頁</a>
        <button class="btn btn-success" name="update" value="<?= $order->id() ?>">確認</button>
    </div>
</form>
</div>
