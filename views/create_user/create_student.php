
<form action="../../controllers/user/create_user.php" method="post">
	<fieldset>
		<label>角色：<input name="role" readonly="readonly" type="text" value="Student"/></label>
		<label>帳號：<input name="sn" type="text" /></label>
		<label>密碼：<input name="pwd" type="password" /></label>
		<label>確認密碼：<input name="confirmpassword" type="password" /></label>
		<label>姓名：<input name="name" type="text" /></label>
		<label>Email：<input name="email" type="text" /></label>
		<label>電話：<input name="phone" type="text" /></label>
		<label>班級：<input name="class" type="text" /></label>
		<label>科系：<input name="department" type="text" /></label>
		<label>學制：<input name="type" type="text" /></label>
		<label>入學年：<input name="year" type="text" /></label>
		<input type="reset" value="重填"/>
		<input type="submit" value="建立使用者"/>
	</fieldset>
</form>
