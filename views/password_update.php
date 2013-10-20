<div class ="col-9 center">
    <?php if (null !== Notice::get()): ?>
        <div class="alert alert-danger"><?=Notice::get()?></div>
    <?php endif; ?>
    <form action="<?= Router::toUrl('controllers/password_update.php') ?>" class="form-horizontal" method="post">
        <table class="table center">
            <th>修改密碼</th>
            <tr>
                <td>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label" for="password">舊密碼</label>
                        <div class="col-lg-10 col-sm-9">
                            <input class="form-control" id="password" name="password" type="password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label" for="newpassword">新密碼</label>
                        <div class="col-lg-10 col-sm-9">
                            <input class="form-control" id="newpassword" name="newpassword" type="password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label" for="confirmpassword">確認密碼</label>
                        <div class="col-lg-10 col-sm-9">
                            <input class="form-control" id="confirmpassword" name="confirmpassword" type="password" />
                        </div>
                    </div>
                    <div>
                        <input class="btn btn-warning" type="submit" value="修改"/>
                    </div>
                </td>
            </tr>
        </table>
    </form>
</div>
