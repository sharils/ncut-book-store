<?php require_once 'controllers/student_order/confirmation.php'; ?>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<form action ="../../controllers/student_order/confirmation_form.php" method="post">
	<fieldset>
		<table>
			<input name="id" type="hidden" value="<?= $order->id() ?>"/>
			<input name="date" type="hidden" value="<?= date("Y-m-d H:i") ?>"/>
			<tr>
				<th>日期</th>
				<td>
					<?= date("Y-m-d H:i") ?>
				</td>
			</tr>
			<tr>
				<th>總金額</th>
				<td><?= $total ?></td>
			</tr>
		</table>
		<a href="<?= Router::toUrl("views/student_order/cart.php"); ?>">返回</a>
		<input type="submit" value="確認"/>
	</fieldset>
</form>