<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Project name</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?=Router::toUrl('home')?>">首頁</a></li>
        <li><a href="<?=Router::toUrl('message/received')?>">訊息</a></li>
        <li><a href="<?=Router::toUrl('account/update')?>">個人資料</a></li>
      </ul>
      <form class="navbar-form navbar-right">
        <div class="form-group">
          <input type="text" placeholder="search" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Sign in</button>
      </form>
    </div><!--/.navbar-collapse -->
  </div>
</div>
<div class="jumbotron">
  <div class="container">
    <h1>Hello, testing!</h1>
  </div>
</div>