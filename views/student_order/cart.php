<?php require_once 'controllers/student_order/cart.php'; ?>
<div class ="col-9 center">
<?php if ($student_order !== NULL): ?>
    <?php if (null !== Notice::get()): ?>
        <div class="alert alert-danger"><?=Notice::get()?></div>
    <?php endif; ?>
    <form action="<?= Router::toUrl('controllers/student_order/cart_form.php') ?>" method="post">
        <table class="table center">
            <tr class="active">
                <th>ISBN</th>
                <th>書名</th>
                <th>版本</th>
                <th>種類</th>
                <th>作者</th>
                <th>出版社</th>
                <th>售價</th>
                <th>數量</th>
                <th>功能</th>
            </tr>
            <?php foreach($student_order_details as $arg): ?>
                <tr>
                    <td><?= htmlspecialchars($arg->book()->isbn()) ?></td>
                    <td><?= htmlspecialchars($arg->book()->name()) ?></td>
                    <td><?= htmlspecialchars($arg->book()->version()) ?></td>
                    <td><?= htmlspecialchars($arg->book()->type()) ?></td>
                    <td><?= htmlspecialchars($arg->book()->author()) ?></td>
                    <td><?= htmlspecialchars($arg->book()->publisher()->name()) ?></td>
                    <td><?= htmlspecialchars($arg->book()->price()) ?></td>
                    <td><input name="number[<?= $arg->id()?>]" type="text" value="<?= htmlspecialchars($arg->number())?>"/></td>
                    <td><button class="btn btn-danger" name="delete[]" value="<?= htmlspecialchars($arg->id())?>">刪除</button></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td align="right" colspan="9">可於送出後進一步確認總金額</td>
            </tr>
        </table>
        <div><input class="btn btn-success" type="submit" value="送出"/></div>
    </form>
<?php else: ?>
    <div class="alert alert-info">目前沒有購物車 ........</div>
<?php endif; ?>
</div>
