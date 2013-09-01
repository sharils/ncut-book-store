<form action="<?= Router::toUrl('controllers/password_update.php') ?>" method="post">
	<label>舊密碼<input name="password" type="password" /></label>
	<label>新密碼<input name="newpassword" type="password" /></label>
	<label>確認密碼<input name="confirmpassword" type="password" /></label>
	<input type="submit" value="送出"/>
</form>
