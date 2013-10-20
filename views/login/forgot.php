<div class="container col-sm-offset-4 col-sm-3 col-lg-4">
    <form class="login" action="<?= Router::toUrl("controllers/login/forgot_pwd.php")?>" class="form-signin" method="post">
        <h2 class="form-signin-heading center">忘記密碼</h2>
        <?php if (null !== Notice::get()): ?>
            <div class="alert alert-danger"><?=Notice::get()?></div>
        <?php else: ?>
            <div class="alert alert-info">請輸入您的帳號和當初驗證的信箱，成功後系統會寄送新密碼至信箱。</div>
        <?php endif;?>
        <p>
            <input class="form-control" name="sn" placeholder="帳號" type="text" autofocus/>
            <input class="form-control" name="email" placeholder="信箱" type="text"/>
        </p>
        <div class="center">
            <input class="btn btn-primary" type="submit" value="送出"/>
            <a class="btn btn-warning" href="<?=Router::toUrl('')?>">返回</a>
        </div>
    </form>
</div>
