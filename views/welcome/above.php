<?php require_once 'controllers/announce/list.php' ?>
<header class="navbar tital navbar-fixed-top bs-docs-nav" role="banner">
<div class="navbar tital navbar-fixed-top">
  <div class="container">
    <div class="navbar-header" >
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?=Router::toUrl('home')?>">NCUT Book Stroe</a>
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
    <!-- <div class="navbar-collapse collapse"> -->
      <ul class="nav navbar-nav">
        <li>
          <a href="<?=Router::toUrl('home')?>"><i class="icon-home"></i>首頁</a>
        </li>
        <li>
          <a href="<?=Router::toUrl('message/received')?>">訊息</a>
        </li>
        <li>
          <a href="<?=Router::toUrl('account/update')?>">個人資料</a>
        </li>
      </ul>
      <div class="search">
        <input class="search-text" type="text" placeholder="search">
        <input class="search-button" type="button">
      </div><!-- /input-group -->
      <form action="<?= Router::toUrl('controllers/login/logout.php')?>" class="navbar-form navbar-right" method="post">
        <div><input class="btn btn-success" type="submit" value="登出"/></div>
      </form>
    </nav>
  </div><!--/.navbar-collapse -->
</div>
</header>
<div class="jumbotron">
  <div class="container">
    <h2><?= htmlspecialchars($announces[0]->title())?></h2>
    <?= $announces[0]->message()?>
  </div>
</div>


