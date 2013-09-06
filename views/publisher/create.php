<div class ="col-lg-9 col-sm-9 center">
	<form action="<?= Router::toUrl('controllers/publisher/create.php') ?>"  method="post">
		<h3>新增出版社</h3>
		<table class="table table-bordered center">
			<tr>
				<td>
				<div class="form-group">
					<label class="col-lg-5 col-sm-5 control-label">出版社名稱</label>
					<div class="col-lg-5 col-sm-5">
						<input class="form-control" name="name" type="text"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-5 col-sm-5 control-label">信箱</label>
					<div class="col-lg-5 col-sm-5">
						<input class="form-control" name="email" type="text"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-5 col-sm-5 control-label">地址</label>
					<div class="col-lg-5 col-sm-5">
						<input class="form-control" name="address" type="text"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-5 col-sm-5 control-label">匯款帳戶</label>
					<div class="col-lg-5 col-sm-5">
						<input class="form-control" name="account" type="text"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-5 col-sm-5 control-label">負責人</label>
					<div class="col-lg-5 col-sm-5">
						<input class="form-control" name="person" type="text"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-5 col-sm-5 control-label">連絡電話</label>
					<div class="col-lg-5 col-sm-5">
						<input class="form-control" name="phone" type="text"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-5 col-sm-5 control-label">傳真號碼</label>
					<div class="col-lg-5 col-sm-5">
						<input class="form-control" name="phone_ext" type="text"/>
					</div>
				</div>
				</td>
			</tr>
		</table>
		<p>
			<input class="btn btn-warning" type="reset" value="重填"/>
			<input class="btn btn-primary" type="submit" value="新增"/>
		</p>
	</form>
</div>