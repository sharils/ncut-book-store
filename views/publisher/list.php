<?php require_once 'controllers/publisher/list.php'; ?>
<table>
	<tr>
		<th>廠商名稱</th>
		<th>地址</th>
		<th>負責人</th>
		<th>連絡電話</th>
		<th>信箱</th>
		<th>匯款帳戶</th>
	</tr>
	<?php foreach ($publishers as $publisher): ?>
		<tr>
			<td><?= $publisher->name() ?></td>
			<td><?= $publisher->address() ?></td>
			<td><?= $publisher->person() ?></td>
			<td><?= $publisher->phone() ?></td>
			<td><?= $publisher->email() ?></td>
			<td><?= $publisher->account() ?></td>
		</tr>
	<?php endforeach; ?>
</table>