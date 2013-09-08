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
    <form action="<?= Router::toUrl('controllers/blacklist/add_remove.php')?>" class="center form-inline" method="post">
            <div class="form-group">
              <label for="add">新增黑名單：</label>
              <input class="form-control" id="add" name="add_user" type="text" >
            </div>
            <div class="form-group">
              <label for="remove">移除黑名單：</label>
              <input class="form-control" id="remove" name="remove_user" type="text" >
            </div>
            <p><input class="btn btn-success" type="submit" value="送出"/></p>
    </form>
</div>