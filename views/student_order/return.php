<?php
require_once 'controllers/student_order/detail.php';
require_once 'controllers/Method.php';
?>
<div class ="col-lg-9 col-sm-9 center">
    <div class="alert alert-info">退書理由：請務必著名數量、原因！</div>
    <form action="<?= Router::toUrl('controllers/student_order/return.php') ?>"  method="post">
    <input name='id' type='hidden' value='<?= htmlspecialchars($studentorder->id()); ?>'/>
    <table class="center table table-bordered">
        <tr class="active">
            <th colspan="6">訂單主檔（狀態：
                <?= htmlspecialchars(Parameter::$status[$studentorder->status()]); ?>）
            </th>
        </tr>
        <tr>
            <th>訂單編號</th>
            <td><?= htmlspecialchars($studentorder->id()); ?></td>
            <th>訂單日期</th>
            <td><?= htmlspecialchars($studentorder->date()); ?></td>
            <th>總額</th>
            <td width="15%"><?= htmlspecialchars($total); ?></td>
        </tr>
        <tr class="active">
            <th colspan="6">訂單明細</th>
        </tr>
        <tr class="active">
            <th>明細編號</th>
            <th>書名</th>
            <th>作者</th>
            <th>數量</th>
            <th colspan="2">理由</th>
        </tr>
        <?php foreach ($student_order_details as $order_detail): ?>
            <tr>
                <td><?= htmlspecialchars($order_detail->id()) ?></td>
                <td><?= htmlspecialchars($order_detail->book()->name()) ?></td>
                <td><?= htmlspecialchars($order_detail->book()->author()) ?></td>
                <td><?= htmlspecialchars($order_detail->number()) ?></td>
                <td colspan="2">
                    <input class="form-control" <?=$disabled?> name="remark[<?=$order_detail->id()?>]"
                        value="<?= htmlspecialchars($order_detail->remark()) ?>" type="text"/>
                </td>
            </tr>
        <?php endforeach; ?>
        </table>
        <input class="btn btn-success" type="submit" value="送出" />
        <a class="btn btn-warning" href="<?= Router::toUrl('home/order')?>">返回</a>
    </form>
</div>
