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
                    <td><?= htmlspecialchars($publisher->name()) ?></td>
                    <td><?= htmlspecialchars($publisher->address()) ?></td>
                    <td><?= htmlspecialchars($publisher->person()) ?></td>
                    <td><?= htmlspecialchars($publisher->phone()) ?></td>
                    <td><?= htmlspecialchars($publisher->email()) ?></td>
                    <td><?= htmlspecialchars($publisher->account()) ?></td>
                    <td><?= htmlspecialchars($publisher->fax()) ?></td>
                    <td>
                         <button class="btn btn-warning" name="update" value="<?= htmlspecialchars($publisher->id()) ?>">
                        修改
                        </button>
                        <button class="btn btn-danger" name="delete" value="<?= htmlspecialchars($publisher->id()) ?>">
                        刪除
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </form>
</div>
