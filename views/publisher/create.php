<?php require_once 'controllers/publisher/add_or_update.php'; ?>
<div class ="col-lg-9 col-sm-9 center">
	<form action="<?= Router::toUrl('controllers/publisher/create.php') ?>"  method="post">
		<h3><?=$diff['status']?>出版社</h3>
		<table class="table table-bordered center">
			<tr>
				<td>
				<div class="form-group">
					<label class="col-lg-5 col-sm-5 control-label">出版社名稱</label>
					<div class="col-lg-5 col-sm-5">
						<input class="form-control" name="id" type="hidden" value="<?= $args['id'] ?>"/>
						<input class="form-control" name="name" type="text" value="<?= $args['name'] ?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-5 col-sm-5 control-label">信箱</label>
					<div disabled class="col-lg-5 col-sm-5">
						<input class="form-control" name="email" type="text" value="<?= $args['email'] ?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-5 col-sm-5 control-label">地址</label>
					<div class="col-lg-5 col-sm-5">
						<input class="form-control" name="address" type="text" value="<?= $args['address'] ?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-5 col-sm-5 control-label">匯款帳戶</label>
					<div class="col-lg-5 col-sm-5">
						<input class="form-control" name="account" type="text" value="<?= $args['account'] ?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-5 col-sm-5 control-label">負責人</label>
					<div class="col-lg-5 col-sm-5">
						<input class="form-control" name="person" type="text" value="<?= $args['person'] ?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-5 col-sm-5 control-label">連絡電話</label>
					<div class="col-lg-5 col-sm-5">
						<input class="form-control" name="phone" type="text" value="<?= $args['phone'] ?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-5 col-sm-5 control-label">傳真號碼</label>
					<div class="col-lg-5 col-sm-5">
						<input class="form-control" name="phone_ext" type="text" value="<?= $args['phone_ext'] ?>"/>
					</div>
				</div>
				</td>
			</tr>
		</table>
		<p>
			<?php if ($resource === 'new'): ?>
				<input class="btn btn-warning" type="reset" value="重填"/>
			<?php endif; ?>
			<input class="btn <?=$diff['class']?>" type="submit" value="<?=$diff['status']?>"/>
		</p>
	</form>
</div>
