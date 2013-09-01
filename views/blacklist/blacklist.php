<?php require_once 'controllers/blacklist/listing.php'; ?>
<table>
	<tr>
		<th>帳號</th>
		<th>名稱</th>
	</tr>
	<?php foreach($black_users as $black_user): ?>
		<tr>
			<td><?= $black_user->toRole()->sn() ?></td>
			<td><?= $black_user->toRole()->name() ?></td>
		</tr>
	<?php endforeach; ?>
</table>
<form action="<?= Router::toUrl('controllers/blacklist/add_remove.php')?>" method="post">
	<fieldset>
		<label>新增黑名單：<input name="add_user" type="text" /></label>
		<label>移除黑名單：<input name="remove_user" type="text" /></label>
		<input type="submit" value="送出"/>
	</fieldset>
</form>
