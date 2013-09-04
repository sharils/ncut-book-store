<?php require_once 'controllers/message/listing.php'; ?>
<a href="<?= Router::toUrl('views/message/list.php?page=spam'); ?>">[垃圾匣]</a>
<a href="<?= Router::toUrl('views/message/list.php?page=receive'); ?>">[收件匣]</a>
<a href="<?= Router::toUrl('views/message/list.php?page=send'); ?>">[寄件匣]</a>
<form action="<?= Router::toUrl('controllers/message/delete.php') ?>" method="post">
	<div>
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
				<a href="<?= Router::toUrl("views/message/detail.php?id={$message->id()}"); ?>">查閱</a>
				<button name="id" value="<?= $message->id() ?>">刪除</button>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
	</div>
</form>
