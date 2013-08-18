<meta http-equiv="content-type" content="text/html; charset=utf-8">

<form action="../controller/login.php" method="post">
	<fieldset>
		<label>帳號：<input type="text" name="user_name"/></label>
		<label>密碼：<input type="password" name="password"/></label>
		<select name="role">
			<option value="teacher">老師</option>
			<option value="student">學生</option>
			<option value="clerk">員生社</option>
			<option value="admin">管理者</option>
		</select>
		<input type="submit" value="登入"/>
	</fieldset>
</form>
