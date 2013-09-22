<?php
require_once 'controllers/clerk/order_list.php';
require_once 'views/course/Method.php';
?>
<div class ="col-lg-9 col-sm-9 center">
<ul class="nav nav-tabs">
        <li class="<?= $active['submitted'] ?>"><a href="<?= Router::toUrl('home/order/submitted')?>">待處理</a></li>
        <li class="<?= $active['ordered'] ?>"><a href="<?= Router::toUrl('home/order/ordered')?>">備貨中</a></li>
        <li class="<?= $active['arrived'] ?>"><a href="<?= Router::toUrl('home/order/arrived')?>">已完成</a></li>
    </ul>
    <form action="" method="post">
        <table class="center table table-bordered">
            <tr class="active">
                <th>訂單編號</th>
                <th>訂購日期</th>
                <th>訂購者</th>
                <th>訂單狀態</th>
                <th>功能</th>
            </tr>
            <?php foreach( $orders as $order ): ?>
            <tr>
                <td><?= $order->id(); ?></td>
                <td><?= $order->date(); ?></td>
                <td><?= $order->student()->name(); ?></td>
                <td><?= $order->status(); ?></td>
                <td><a class="btn btn-info" href="<?= Router::toUrl("home/order/{$order->status()}/{$order->id()}"); ?>">詳細資料</a></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </form>
</div>
