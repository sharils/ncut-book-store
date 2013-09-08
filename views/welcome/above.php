<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">NCUT Book Stroe</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?=Router::toUrl('home')?>">首頁</a></li>
        <li><a href="<?=Router::toUrl('message/received')?>">訊息</a></li>
        <li><a href="<?=Router::toUrl('account/update')?>">個人資料</a></li>
      </ul>
      <form action="<?= Router::toUrl('controllers/login/logout.php')?>" class="navbar-form navbar-right" method="post">
        <div><input class="btn btn-success" type="submit" value="登出"/></div>
      </form>
      <form class="navbar-form navbar-right">
        <div class="form-group">
          <input type="text" placeholder="search" class="form-control">
        </div>
      </form>
    </div><!--/.navbar-collapse -->
  </div>
</div>
<div class="jumbotron">
  <div class="container">
    <h1>Hello, testing!</h1>
  </div>
</div>
