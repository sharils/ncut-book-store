<?php
require_once 'controllers/student_order/detail.php';
require_once 'controllers/Method.php';
?>
<div class ="col-lg-9 col-sm-9 center">
    <table class="center table table-bordered">
        <tr class="active">
            <th colspan="9">訂單主檔（狀態：<?= htmlspecialchars(Parameter::$status[$studentorder->status()]); ?>）</th>
        </tr>
        <tr>
            <th>訂單編號</th>
            <td colspan="2"><?= htmlspecialchars($studentorder->id()); ?></td>
            <th>訂單日期</th>
            <td colspan="2"><?= htmlspecialchars($studentorder->date()); ?></td>
            <th>總額</th>
            <td colspan="2"><?= htmlspecialchars($total); ?></td>
        </tr>
        <tr class="active">
            <th colspan="9">訂單明細</th>
        </tr>
        <tr class="active">
            <th>明細編號</th>
            <th>ISBN</th>
            <th>書名</th>
            <th>版本</th>
            <th>作者</th>
            <th>出版社</th>
            <th>價格</th>
            <th>數量</th>
            <th>小計</th>
        </tr>
        <?php foreach ($student_order_details as $order_detail): ?>
            <tr>
                <td><?= htmlspecialchars($order_detail->id()) ?></td>
                <td><?= htmlspecialchars($order_detail->book()->isbn()) ?></td>
                <td><?= htmlspecialchars($order_detail->book()->name()) ?></td>
                <td><?= htmlspecialchars($order_detail->book()->version()) ?></td>
                <td><?= htmlspecialchars($order_detail->book()->author()) ?></td>
                <td><?= htmlspecialchars($order_detail->book()->publisher()->name()) ?></td>
                <td><?= htmlspecialchars($order_detail->book()->price()) ?></td>
                <td><?= htmlspecialchars($order_detail->number()) ?></td>
                <?php $sum = $order_detail->book()->price() * $order_detail->number()?>
                <td><?= htmlspecialchars($sum) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a class="btn btn-default" href="<?= Router::toUrl('home/order')?>">返回</a>
</div>
