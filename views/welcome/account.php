<ul class="nav">
    <?php if ($role === 'admin'): ?>
        <li><a href="<?= Router::toUrl('account/modify'); ?>">個人資料</a></li>
    <?php endif ?>
    <li><a href="<?= Router::toUrl('account/update'); ?>">修改密碼</a></li>
</ul>
