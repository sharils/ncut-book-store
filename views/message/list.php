<?php require_once '../../controllers/message/listing.php'; ?>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<a href="list.php?page=spam">[垃圾匣]</a>
<a href="list.php?page=receive">[收件匣]</a>
<a href="list.php?page=send">[寄件匣]</a>
<table>
	<caption>訊息列表</caption>
	<tr>
		<th>寄件人</th>
		<th>內容</th>
		<th>時間</th>
		<th>功能</th>
	</tr>
	<?php foreach($messageslist as $message): ?>
		<tr>
			<td><?= $message->sender()->toRole()->sn()?></td>
			<td><?= $message->content() ?></td>
			<td><?= $message->date() ?></td>
			<td>
				<a href="detail.php?id=<?= $message->id() ?>">查閱</a>
				<a href="../../controllers/message/delete.php?id=<?= $message->id() ?>">刪除</a>
			</td>
		</tr>
	<?php endforeach; ?>
</table>