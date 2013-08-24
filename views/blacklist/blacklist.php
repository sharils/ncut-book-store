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
<form action="../../controllers/create_user.php" method="post">
	<fieldset>
		<label>新增使用者：<input name="add_user" type="text" /></label>
		<label>移除使用者：<input name="black_user" type="text" /></label>
		<input type="submit" value="送出"/>
	</fieldset>
</form>