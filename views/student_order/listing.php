<?php
require_once 'controllers/student_order/list.php';
require_once 'controllers/Method.php';
?>
<form action="<?= Router::toUrl('controllers/student_order/cancel.php') ?>" method="post">
	<div>
	<table>
		<tr>
			<th>訂單編號</th>
			<th>日期</th>
			<th>負責人</th>
			<th>狀態</th>
			<th>功能</th>
		</tr>
		<?php foreach ($student_orders as $student_order): ?>
			<tr>
				<td><?= $student_order->id() ?></td>
				<td><?= date("Y-m-d H:i", strtotime($student_order->date())) ?></td>
				<td>
					<?= ($student_order->clerk() === NULL) ? '' : Method::selectList('Clerk')[$student_order->clerk()->id()] ?>
				</td>
				<td><?= $student_order->status() ?></td>
				<td>
					<a href="<?= Router::toUrl("views/student_order/detail.php?id={$student_order->id()}"); ?>">詳細</a>
					<?php if ($student_order->status() === 'submitted'): ?>
						<button name="cancel_id" value="<?= $student_order->id() ?>">取消訂單</button>
					<?php endif; ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	</div>
</form>