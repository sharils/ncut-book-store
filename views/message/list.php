<?php require_once 'controllers/message/listing.php'; ?>
<div class ="col-9 center">
    <form action="<?= Router::toUrl('controllers/message/delete.php') ?>" method="post">
        <table class="table center">
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
                <td><?= htmlspecialchars($flag ? $message->sender()->toRole()->sn() : $message->receiver()->toRole()->sn()) ?></td>
                <td><?= htmlspecialchars($message->content()) ?></td>
                <td><?= htmlspecialchars($message->date()) ?></td>
                <td>
                    <a class="btn btn-info" href="<?= Router::toUrl("message/{$message->id()}"); ?>">查閱</a>
                    <button class="btn btn-danger" name="id" value="<?= htmlspecialchars($message->id()) ?>">刪除</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </table>
    </form>
    <?php Page::getPage()?>
</div>
<script>
$(function(){
    $('.btn-danger').on('click',function(){
        if(confirm("您確定刪除此訊息嗎?"))
        {
            return true;
        }else{
            return false;
        }
    });
});
</script>
