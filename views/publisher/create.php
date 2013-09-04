<form action="<?= Router::toUrl('controllers/publisher/create.php') ?>" method="post">
	<fieldset>
		<label>廠商名稱<input name="name" type="text"/></label>
		<label>信箱<input name="email" type="text"/></label>
		<label>地址<input name="address" type="text"/></label>
		<label>匯款帳戶<input name="account" type="text"/></label>
		<label>負責人<input name="person" type="text"/></label>
		<label>連絡電話<input name="phone" type="text"/></label>
		<input type="submit" value="送出"/>
	</fieldset>
</form>
