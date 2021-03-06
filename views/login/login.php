<div class="container col-sm-offset-4 col-sm-3 col-lg-4">
<form action="<?= Router::toUrl("controllers/login/login.php")?>" class="form-signin" method="post">

    <h2 class="form-signin-heading center">線上訂書系統</h2>
    <?php if (null !== Notice::get()): ?>
        <div class="alert alert-danger"><?=Notice::get()?></div>
    <?php endif; ?>
    <p>
        <input class="form-control" name="user_name" placeholder="帳號" type="text" autofocus/>
        <input class="form-control" name="password" placeholder="密碼" type="password"/>
    </p>
    <p>
        <select class="form-control" name="role">
            <option value="student">學生</option>
            <option value="teacher">老師</option>
            <option value="clerk">員生社</option>
            <option value="admin">管理者</option>
        </select>
    </p>
    <div>
        <input class="btn btn-primary" type="submit" value="登入"/>
        <a class="btn btn-warning" href="<?=Router::toUrl('forgot')?>">忘記密碼</a>
    </div>
</form>
</div>
