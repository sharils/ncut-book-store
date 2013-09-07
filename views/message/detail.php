<?php require_once 'controllers/message/detail.php'; ?>
<div class ="col-lg-9 col-sm-9">
	<table class="center table table-bordered">
		<tr class="active">
			<th colspan="4">詳細訊息</th>
		</tr>
		<tr>
			<th>寄件人</th>
			<td><?= $message->sender()->toRole()->sn() ?></td>
			<th>時間</th>
			<td><?= $message->date() ?></td>
		</tr>
		<tr>
			<th colspan="4">內容</th>
		</tr>
		<tr>
			<td colspan="4"><?= $message->content() ?></td>
		</tr>
	</table>
</div>
