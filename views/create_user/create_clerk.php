<meta http-equiv="content-type" content="text/html; charset=utf-8">

<form action="../../controllers/user/create_user.php" method="post">
	<fieldset>
	<div>
		<label>角色：</label>
		<input name="role" readonly="readonly" type="text" value="Clerk"/>
	</div>
		<label>帳號：<input name="sn" type="text" /></label>
		<label>密碼：<input name="pwd" type="password" /></label>
		<label>確認密碼：<input name="confirmpassword" type="password" /></label>
		<label>姓名：<input name="name" type="text" /></label>
		<label>Email：<input name="email" type="text" /></label>
		<label>電話：<input name="phone" type="text" /></label>
		<label>傳真號碼：<input name="phone_ext" type="text" /></label>
		<input type="reset" value="重填"/>
		<input type="submit" value="建立使用者"/>
	</fieldset>
</form>