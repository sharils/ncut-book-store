<?php
require_once 'controllers/course/select_list.php';
require_once 'controllers/clerk/order_detail.php';
require_once 'views/course/Method.php';
?>
<div class ="col-xs-9 col-lg-9 col-sm-9 center">
<form action="<?= Router::toUrl("controllers/clerk/clerk_update.php")?>" method="post">
    <div><input name="course" type="hidden" value="<?= $order->id(); ?>"/></div>
    <table class="table table-bordered center">
        <tr class="active">
            <th colspan="6">訂單資料</th>
        <tr>
            <th>訂單編號</th>
            <td><?= $order->id(); ?></td>
            <th>訂購日期</th>
            <td><?= $order->date(); ?></td>
            <th>購買者</th>
            <td><?= $order->student()->name(); ?></td>
        </tr>
        <tr class="active">
            <th colspan="6">訂單明細</th>
        <tr class="active">
            <th>明細編號</th>
            <th>書籍名稱</th>
            <th>版本</th>
            <th>ISBN</th>
            <th>數量</th>
            <th>單價</th>
        </tr>
        <?php foreach( $orderdetails as $orderdetail ): ?>
            <tr>
                <td><?= htmlspecialchars($orderdetail->id()); ?></td>
                <td><?= htmlspecialchars($orderdetail->book()->name()); ?></td>
                <td><?= htmlspecialchars($orderdetail->book()->isbn()); ?></td>
                <td><?= htmlspecialchars($orderdetail->book()->version()) ?></td>
                <td><?= htmlspecialchars($orderdetail->number()); ?></td>
                <td><?= htmlspecialchars($orderdetail->book()->price()); ?></td>
            </tr>
    <?php endforeach; ?>
         <tfoot class="active">
            <td align="right" colspan="5">總金額</td>
            <td align="right" colspan="1">NT$ <?= $total; ?></td>

        <tr>
            <td colspan="1"> 負責人</td>
            <td colspan="2"><?= $clerk->name(); ?></td>
            <td colspan="2"> 訂單管理</td>
            <td colspan="1" name="status"><?= Method::select('status', Parameter::$status,null,$save_valu);?></td>
        </tr>
        </tfoot>
    </table>
    <div>
        <button class="btn btn-success" name="update" value="<?= $order->id() ?>">修改</button>
        <a class="btn btn-info" name="update" href="<?= Router::toUrl("home/order/{$order->status()}"); ?>">確認</a>
    </div>
</form>
</div>
