<?php require_once 'controllers/announce/list.php';?>
<div class ="col-9 center">
    <div class="alert alert-info">本系統以時間最新者優先公告</div>
    <form action="<?= Router::toUrl('controllers/announce/delete.php') ?>"  method="post">
        <table class="table center">
            <tr>
                <th><label>時間</label></th>
                <th><label>標題</label></th>
                <th><label>內容</label></th>
                <th><label>最後編輯人</label></th>
                <th><label>功能</label></th>
            </tr>
            <?php foreach ($announces as $announce): ?>
                <tr>
                    <td><label><?= date("Y-m-d h:m", strtotime(htmlspecialchars($announce->date()))) ?></label></td>
                    <td><label><?= htmlspecialchars($announce->title())?></label></td>
                    <td><label><?= htmlspecialchars($announce->message()) ?></label></td>
                    <td><label><?= htmlspecialchars($announce->user()->name())?></label></td>
                    <td>
                        <a  class="btn btn-primary"
                            href="<?= Router::toUrl("home/announce/{$announce->id()}")?>">
                            修改
                        </a>
                        <button class="btn btn-danger" name="remove_announce"
                                value="<?= htmlspecialchars($announce->id()) ?>">刪除
                        </button>
                    </td>
                <tr>
            <?php endforeach; ?>
        </table>
        <p>
            <a class="btn btn-primary" href="<?= Router::toUrl("home/announce/new")?>">
                新增公告
            </a>
        </p>
    </form>
</div>
