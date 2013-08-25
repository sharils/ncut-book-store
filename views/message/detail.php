<?php require_once '../../controllers/message/detail.php'; ?>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<table>
	<caption>詳細訊息</caption>
	<tr>
		<th>寄件人</th>
		<td><?= $message->sender()->toRole()->sn() ?></td>
	</tr>
	<tr>
		<th>內容</th>
		<td><?= $message->content() ?></td>
	</tr>
	<tr>
		<th>時間</th>
		<td><?= $message->date() ?></td>
	</tr>
</table>