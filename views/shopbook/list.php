<?php require_once '../../controllers/shopbook/list.php'; ?>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<table>
	<tr>
		<th>ISBN</th>
		<th>書名</th>
		<th>版本</th>
		<th>種類</th>
		<th>作者</th>
		<th>出版社</th>
		<th>原價</th>
		<th>售價</th>
		<th>數量</th>
		<th>狀態</th>
		<th>功能</th>
	</tr>
	<?php foreach($shopbooks as $shopbook): ?>
		<tr>
			<td><?= $shopbook->book()->isbn() ?></td>
			<td><?= $shopbook->book()->name() ?></td>
			<td><?= $shopbook->book()->version() ?></td>
			<td><?= $shopbook->book()->type() ?></td>
			<td><?= $shopbook->book()->author() ?></td>
			<td><?= $shopbook->book()->publisher()->name() ?></td>
			<td><?= $shopbook->book()->marketPrice() ?></td>
			<td><?= $shopbook->book()->price() ?></td>
			<td><?= $shopbook->number() ?></td>
			<td><?= ($shopbook->shelf() == true) ? '上架中' : '下架中' ?></td>
			<td><a href="../../controllers/shopbook/change_shelf.php?id=<?=$shopbook->book()->id()?>">修改狀態</a></td>
		</tr>
	<?php endforeach; ?>
</table>