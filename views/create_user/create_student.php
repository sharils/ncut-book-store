<div class ="col-lg-9 col-sm-9 center">
    <form action="<?= Router::toUrl('controllers/user/create_user.php') ?>" method="post">
        <h3>新增學生</h3>
        <table class="table table-bordered center">
            <tr>
                <td>
                <div class="form-group">
                    <label class="col-lg-5 col-sm-5 control-label">角色</label>
                    <div class="col-lg-5 col-sm-5">
                        <input class="form-control" name="role" readonly="readonly" type="text" value="Student"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 col-sm-5 control-label">帳號</label>
                    <div class="col-lg-5 col-sm-5">
                        <input class="form-control" name="sn" type="text"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 col-sm-5 control-label">密碼</label>
                    <div class="col-lg-5 col-sm-5">
                        <input class="form-control" name="pwd" type="password"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 col-sm-5 control-label">確認密碼</label>
                    <div class="col-lg-5 col-sm-5">
                        <input class="form-control" name="confirmpassword" type="password"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 col-sm-5 control-label">姓名</label>
                    <div class="col-lg-5 col-sm-5">
                        <input class="form-control" name="name" type="text"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 col-sm-5 control-label">Email</label>
                    <div class="col-lg-5 col-sm-5">
                        <input class="form-control" name="email" type="text"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 col-sm-5 control-label">電話</label>
                    <div class="col-lg-5 col-sm-5">
                        <input class="form-control" name="phone" type="text"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 col-sm-5 control-label">班級</label>
                    <div class="col-lg-5 col-sm-5">
                        <input class="form-control" name="class" type="text"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 col-sm-5 control-label">科系</label>
                    <div class="col-lg-5 col-sm-5">
                        <input class="form-control" name="department" type="text"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 col-sm-5 control-label">學制</label>
                    <div class="col-lg-5 col-sm-5">
                        <input class="form-control" name="type" type="text"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 col-sm-5 control-label">入學年</label>
                    <div class="col-lg-5 col-sm-5">
                        <input class="form-control" name="year" type="text"/>
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