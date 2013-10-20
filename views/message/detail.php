<?php require_once 'controllers/message/detail.php'; ?>
<div class ="col-9 center">
    <table class="table center">
        <tr class="active">
            <th colspan="4">詳細訊息</th>
        </tr>
        <tr>
            <th>寄件人</th>
            <td><?= htmlspecialchars($message->sender()->toRole()->sn()) ?></td>
            <th>時間</th>
            <td><?= htmlspecialchars($message->date()) ?></td>
        </tr>
        <tr>
            <th colspan="4">內容</th>
        </tr>
        <tr>
            <td colspan="4"><?= htmlspecialchars($message->content()) ?></td>
        </tr>
    </table>
</div>
