<?php require_once 'controllers/blacklist/listing.php'; ?>
<div class ="col-lg-9 col-sm-9">
    <table class="center table table-bordered">
        <tr class="active">
            <th>帳號</th>
            <th>名稱</th>
        </tr>
        <?php foreach($black_users as $black_user): ?>
            <tr>
                <td><?= $black_user->toRole()->sn() ?></td>
                <td><?= $black_user->toRole()->name() ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <hr>
    <form action="<?= Router::toUrl('controllers/blacklist/add_remove.php')?>" class="center form-horizontal" method="post">
        <div class="row">
            <div class="col-lg-5 col-sm-5">
              <label for="add">新增黑名單：</label>
              <input class="form-control" id="add" name="add_user" type="text" >
            </div>
            <div class="col-lg-5 col-sm-5">
              <label for="remove">移除黑名單：</label>
              <input class="form-control" id="remove" name="remove_user" type="text" >
            </div>
            <div class="col-lg-2 col-sm-2">
                </br><input class="btn btn-success" type="submit" value="送出"/>
            </div>
        </div>
    </form>
</div>
