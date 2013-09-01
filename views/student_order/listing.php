<?php
require_once 'controllers/student_order/list.php';
require_once 'controllers/Method.php';
?>
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
				<a href="<?= Router::toUrl("controllers/student_order/cancel.php?id={$student_order->id()}"); ?>">
					<?= ($student_order->status() === 'submitted') ? '取消訂單' : '' ?>
				</a>
			</td>
		</tr>
	<?php endforeach; ?>
</table>
