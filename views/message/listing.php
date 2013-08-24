<?php require_once '../../controllers/message/listing.php'; ?>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<table>
	<tr>
		<th>寄件人</th>
		<th>內容</th>
		<th>時間</th>
		<th>功能</th>
	</tr>
	<?php foreach($messages as $message): ?>
		<tr>
			<td><?= $userdata[$message->sender()->id()] ?></td>
			<td><?= $message->content() ?></td>
			<td><?= $message->date() ?></td>
			<td><button value="<?= $message->id() ?>">查閱</button></td>
		</tr>
	<?php endforeach; ?>
</table>