<?php
require_once 'controllers/student_order/list.php';
require_once 'controllers/Method.php';
?>
<div class ="col-9 center">
<form action="<?= Router::toUrl('controllers/student_order/cancel.php') ?>" method="post">
    <table class="table center">
        <tr class="active">
            <th>訂單編號</th>
            <th>日期</th>
            <th>負責人</th>
            <th>狀態</th>
            <th>功能</th>
        </tr>
        <?php foreach ($student_orders as $student_order): ?>
            <tr>
                <td><?= $student_order->id() ?></td>
                <td><?= date("Y-m-d H:i", strtotime(htmlspecialchars($student_order->date()))) ?></td>
                <td>
                    <?= htmlspecialchars(($student_order->clerk() === NULL) ? '' : Contro_Method::selectList('Clerk')[$student_order->clerk()->id()]) ?>
                </td>
                <td><?= htmlspecialchars(Parameter::$status[$student_order->status()]) ?></td>
                <td>
                    <a class="btn btn-info" href="<?= Router::toUrl("home/order/{$student_order->id()}"); ?>">詳細</a>
                    <?php if ($student_order->status() === 'submitted'): ?>
                        <button class="btn btn-danger" name="cancel_id" value="<?= htmlspecialchars($student_order->id()) ?>">取消訂單</button>
                    <?php elseif($student_order->status() === 'finished' || $student_order->status() === 'return' ): ?>
                        <a class="btn btn-danger" href="<?= Router::toUrl("home/return/{$student_order->id()}"); ?>">退書申請</a>
                    <?php endif;?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</form>
</div>
