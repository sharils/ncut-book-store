<?php
require_once 'controllers/clerk/order_list.php';
require_once 'views/course/Method.php';
?>
<div class ="col-9 center">
<ul class="nav nav-tabs">
        <li class="<?= $active['submitted'] ?>"><a href="<?= Router::toUrl('home/order/submitted')?>">待處理</a></li>
        <li class="<?= $active['processing'] ?>"><a href="<?= Router::toUrl('home/order/processing')?>">處理中</a></li>
        <li class="<?= $active['arrived'] ?>"><a href="<?= Router::toUrl('home/order/arrived')?>">可取貨</a></li>
        <li class="<?= $active['finished'] ?>"><a href="<?= Router::toUrl('home/order/finished')?>">已完成</a></li>
        <li class="<?= $active['cancel'] ?>"><a href="<?= Router::toUrl('home/order/cancel')?>">取消</a></li>
        <li class="<?= $active['return'] ?>"><a href="<?= Router::toUrl('home/order/return')?>">退書申請</a></li>

    </ul>
    <form action="" method="post">
        <table class="table center">
            <tr class="active">
                <th>訂單編號</th>
                <th>訂購日期</th>
                <th>訂購者</th>
                <th>訂單狀態</th>
                <th>功能</th>
            </tr>
            <?php foreach( $orders as $order ): ?>
            <tr>
                <td><?= htmlspecialchars($order->id()); ?></td>
                <td><?= htmlspecialchars($order->date()); ?></td>
                <td><?= htmlspecialchars($order->student()->name()); ?></td>
                <td><?= htmlspecialchars(Parameter::$status[$order->status()]); ?></td>
                <td><a class="btn btn-info" href="<?= Router::toUrl("home/order/{$order->status()}/{$order->id()}"); ?>">詳細資料</a></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </form>
</div>
