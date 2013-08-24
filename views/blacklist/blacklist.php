<?php require_once '../../controllers/blacklist/listing.php'; ?>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<table>
	<tr>
		<th>帳號</th>
		<th>名稱</th>
	</tr>
	<?php foreach($blackusers as $blackuser): ?>
		<tr>
			<td><?= $usersn[$blackuser->id()] ?></td>
			<td><?= $username[$blackuser->id()] ?></td>
		</tr>
	<?php endforeach; ?>
</table>
<form action="../../controllers/blacklist/add_remove.php" method="post">
	<fieldset>
		<label>新增黑名單：<input name="add_user" type="text" /></label>
		<label>移除黑名單：<input name="remove_user" type="text" /></label>
		<input type="submit" value="送出"/>
	</fieldset>
</form>