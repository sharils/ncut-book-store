<header id="header">
    <h2>
        勤益購書系統
    </h2>
    <h4>
        NCUT Book Store
    </h4>
</header>
<div>
<form action="<?= Router::toUrl("controllers/login/login.php")?>" class="login form-signin" method="post">
    <h2>Log In</h2>
    <?php if (null !== Notice::get()): ?>
        <div class="error sign"><?=Notice::get()?></div>
    <?php endif; ?>
    <fieldest class="compact-from-fields">
        <div class="field-group">
            <label>帳號</label>
            <input class="form-control" name="user_name" placeholder="帳號" type="text" autofocus/>
        </div>
        <div class="field-group">
            <label>密碼</label>
            <input class="form-control" name="password" placeholder="密碼" type="password"/>
        </div>
        <div class="field-group">
            <label>身份</label>
                <select class="form-control" name="role">
                    <option value="student">學生</option>
                    <option value="teacher">老師</option>
                    <option value="clerk">員生社</option>
                    <option value="admin">管理者</option>
                </select>
        </div>
    <div class="field-group">
        <input class="btn btn-primary" type="submit" value="登入"/>
        <a class="btn btn-warning" href="<?=Router::toUrl('forgot')?>">忘記密碼</a>
    </div>
    </fieldest>
</form>
</div>
