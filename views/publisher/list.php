<?php require_once 'controllers/publisher/list.php'; ?>
<div class ="col-lg-9 col-sm-9">
    <form action="<?= Router::toUrl('controllers/publisher/delete_or_update.php') ?>" method="post">
        <table class="center table table-bordered">
            <tr class="active">
                <th>廠商名稱</th>
                <th>地址</th>
                <th>負責人</th>
                 <th>連絡電話</th>
                <th>信箱</th>
                <th>匯款帳戶</th>
                <th>傳真電話</th>
                <th>功能</th>
            </tr>
            <?php foreach ($publishers as $publisher): ?>
                <tr>
                    <td><?= $publisher->name() ?></td>
                    <td><?= $publisher->address() ?></td>
                    <td><?= $publisher->person() ?></td>
                    <td><?= $publisher->phone() ?></td>
                    <td><?= $publisher->email() ?></td>
                    <td><?= $publisher->account() ?></td>
                    <td><?= $publisher->phone_ext() ?></td>
                    <td>
                         <button class="btn btn-warning" name="update" value="<?= $publisher->id() ?>">
                        修改
                        </button>
                        <button class="btn btn-danger" name="delete" value="<?= $publisher->id() ?>">
                        刪除
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </form>
</div>
