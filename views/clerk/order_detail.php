<?php
require_once 'controllers/course/select_list.php';
require_once 'controllers/clerk/order_detail.php';
require_once 'views/course/Method.php';
?>
<div class ="col-xs-9 col-lg-9 col-sm-9 center">
<?php if ($order->status() === 'return'): ?>
    <table class="table table-bordered center">
        <tr class="active">
            <th colspan="2">退書申請</th>
        </tr>
        <tr class="active">
            <th width="20%">書名</th>
            <th width="80%">理由</th>
        </tr>
    <?php foreach ($orderdetails as $orderdetail): ?>
        <?php if (!empty($orderdetail->remark())): ?>
            <tr>
                <td><?= htmlspecialchars($orderdetail->book()->name()); ?></td>
                <td><?= htmlspecialchars($orderdetail->remark()); ?></td>
            </tr>
        <?php endif;?>
    <?php endforeach; ?>
    <tablse>
<?php endif; ?>
<form action="<?= Router::toUrl("controllers/clerk/clerk_update.php")?>" method="post">
    <div><input name="course" type="hidden" value="<?= $order->id(); ?>"/></div>
    <table class="table table-bordered center">
        <tr class="active">
            <th colspan="8">訂單資料</th>
        <tr>
            <th>訂單編號</th>
            <td colspan="2"><?= htmlspecialchars($order->id()); ?></td>
            <th>訂購日期</th>
            <td><?= htmlspecialchars($order->date()); ?></td>
            <th>購買者</th>
            <td colspan="2"><?= htmlspecialchars($order->student()->name().'【'.$order->student()->sn().'】'); ?></td>
        </tr>
        <tr class="active">
            <th colspan="6">訂單明細</th>
            <th colspan="2">庫存/目前需求量</th>
        </tr>
        <tr class="active">
            <th>明細編號</th>
            <th>書籍名稱</th>
            <th>版本</th>
            <th>ISBN</th>
            <th>數量</th>
            <th>單價</th>
            <th>庫存</th>
            <th>需求</th>
        </tr>
        <?php foreach( $orderdetails as $k => $orderdetail ): ?>
            <tr>
                <td><?= htmlspecialchars($orderdetail->id()); ?></td>
                <td><?= htmlspecialchars($orderdetail->book()->name()); ?></td>
                <td><?= htmlspecialchars($orderdetail->book()->isbn()); ?></td>
                <td><?= htmlspecialchars($orderdetail->book()->version()) ?></td>
                <td><?= htmlspecialchars($orderdetail->number()); ?></td>
                <td><?= htmlspecialchars($orderdetail->book()->price()); ?></td>
                <td><?= htmlspecialchars($shopbook[$k]->number()); ?></td>
                <?php $num = ($orderdetail->book()->getStudentNeed() + $orderdetail->book()->getTeacherNeed()) ?>
                <td><?= htmlspecialchars($num); ?></td>
            </tr>
        <?php endforeach; ?>

         <tfoot class="active">
            <td align="right" colspan="6">總金額</td>
            <td align="right" colspan="2">NT$ <?= $total; ?></td>

        <tr>
            <td colspan="2"> 負責人</td>
            <td colspan="2"><?= Method::select('clerk_id', $clerkArgs, null, $order->clerk()->id());?></td>
            <td colspan="2"> 訂單管理</td>
            <td colspan="2" name="status"><?= Method::select('status', Parameter::$status,null,$save_valu);?></td>
        </tr>
        </tfoot>
    </table>
    <div>
        <button class="btn btn-success" name="update" value="<?= $order->id() ?>">修改</button>
        <a class="btn btn-default" name="update" href="<?= Router::toUrl("home/order/{$order->status()}"); ?>">返回</a>
    </div>
</form>

</div>
