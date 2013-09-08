<?php require_once 'controllers/message/listing.php'; ?>
<div class ="col-lg-9 col-sm-9">
    <form action="<?= Router::toUrl('controllers/message/delete.php') ?>" method="post">
        <table class="center table table-bordered">
        <tr class="active">
            <th colspan="4">訊息列表</th>
        </tr>
        <tr>
            <th><?= $flag ? '寄件人' : '收件人' ?></th>
            <th>內容</th>
            <th>時間</th>
            <th>功能</th>
        </tr>
        <?php foreach($messageslist as $message): ?>
            <tr>
                <td><?= $flag ? $message->sender()->toRole()->sn() : $message->receiver()->toRole()->sn() ?></td>
                <td><?= $message->content() ?></td>
                <td><?= $message->date() ?></td>
                <td>
                    <a class="btn btn-info" href="<?= Router::toUrl("message/{$message->id()}"); ?>">查閱</a>
                    <button class="btn btn-danger" name="id" value="<?= $message->id() ?>">刪除</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </table>
    </form>
</div>
