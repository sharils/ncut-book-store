<?php require_once 'controllers/student_order/confirmation.php'; ?>
<div class ="col-lg-9 col-sm-9">
    <form action ="<?= Router::toUrl('controllers/student_order/confirmation_form.php') ?>" method="post">
        <table class="center table table-bordered">
            <tr class="active">
                <th colspan="2">訂單金額最後確認</th>
            </tr>
            <tr>
                <th>日期</th>
                <td>
                    <?= date("Y-m-d H:i") ?>
                </td>
            </tr>
            <tr>
                <th>總金額</th>
                <td><?= htmlspecialchars($total) ?></td>
            </tr>
        </table>
        <div>
            <a class="btn btn-success" href="<?= Router::toUrl("home/order/cart"); ?>">返回</a>
            <input class="btn btn-success" type="submit" value="確認"/>
            <input name="id" type="hidden" value="<?= htmlspecialchars($order->id()) ?>"/>
            <input name="date" type="hidden" value="<?= date("Y-m-d H:i") ?>"/>
        </div>
    </form>
</div>
