<?php
require_once 'controllers/student_order/detail.php';
require_once 'controllers/Method.php';
?>
<div class ="col-lg-9 col-sm-9">
	<table class="center table table-bordered">
		<tr class="active">
			<th>明細編號</th>
			<th>ISBN</th>
			<th>書名</th>
			<th>版本</th>
			<th>種類</th>
			<th>作者</th>
			<th>出版社</th>
			<th>價格</th>
			<th>數量</th>
		</tr>
		<?php foreach ($student_order_details as $student_order_detail): ?>
			<tr>
				<td><?= $student_order_detail->id() ?></td>
				<td><?= $student_order_detail->book()->isbn() ?></td>
				<td><?= $student_order_detail->book()->name() ?></td>
				<td><?= $student_order_detail->book()->version() ?></td>
				<td><?= $student_order_detail->book()->type() ?></td>
				<td><?= $student_order_detail->book()->author() ?></td>
				<td><?= $student_order_detail->book()->publisher()->name() ?></td>
				<td><?= $student_order_detail->book()->price() ?></td>
				<td><?= $student_order_detail->number() ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
	<a class="btn btn-default" href="<?= Router::toUrl('views/student_order/listing.php')?>">返回</a>
</div>
