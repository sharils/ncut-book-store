<?php require_once 'controllers/announce/above.php' ?>
<header class="navbar title navbar-fixed-top bs-docs-nav" role="banner">
<div class="navbar title navbar-fixed-top">

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
      <form action="<?= Router::toUrl('controllers/login/logout.php')?>" class="navbar-form navbar-right" method="post">
        <div><input class="btn btn-primary" type="submit" value="登出"/></div>
      </form>
      <!-- <div class="search">
        <form>
          <div class="input-prepend">
           <span class="add-on"><i class="icon-search"></i></span> -->
           <!--  <input class="search-text" type="text" placeholder="search">
            <button class="search-text add-on"><i class="icon-search"></i></button>
          </div>
        </form>
      </div>--><!-- /input-group -->
    </nav>
  </div><!--/.navbar-collapse -->
</div>
</header>
<div class="jumbotron">
  <div class="container">
    <div class="announce">
      <div class="announce-text" style="">
        <h2><?= htmlspecialchars($announces[0]->title())?></h2>
        <h4><?= $announces[0]->message()?></h4>
      </div>
     </div>
  </div>
</div>


