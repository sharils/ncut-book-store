
<form action="../../controllers/login/login.php" method="post">
	<fieldset>
		<label>帳號：<input name="user_name" type="text" /></label>
		<label>密碼：<input name="password" type="password" /></label>
		<label><input name="role" type="radio" value="admin" />管理者</label>
		<label><input name="role" type="radio" value="clerk" />員生社</label>
		<label><input name="role" type="radio" value="student" />學生</label>
		<label><input name="role" type="radio" value="teacher" />老師</label>
		<input type="submit" value="登入"/>
	</fieldset>
</form>
