<?php require_once 'controllers/user/list.php';?>
<div class ="col-lg-9 col-sm-9 center">
    <ul class="nav nav-tabs">
        <li class="<?= $active['clerk'] ?>"><a href="<?= Router::toUrl('home/clerk/list')?>">員生社</a></li>
        <li class="<?= $active['student'] ?>"><a href="<?= Router::toUrl('home/student/list')?>">學生</a></li>
        <li class="<?= $active['teacher'] ?>"><a href="<?= Router::toUrl('home/teacher/list')?>">老師</a></li>
    </ul>
    <form action="<?= Router::toUrl('controllers/user/update_or_delete.php') ?>"  method="post">
        <table class="table table-bordered center">
            <tr>
                <?php foreach ($args as $v): ?>
                    <td><?= $v[0] ?></td>
                <?php endforeach; ?>

                <td>功能</td>
            </tr>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <?php foreach ($args as $k => $v_arg): ?>
                        <?php $k = ($k === 'class') ? 'type' : $k; ?>
                        <td><?= $row->$k() ?></td>
                    <?php endforeach; ?>
                    <td>
                        <button class="btn btn-warning" name="update" value="<?= $row->id()?>">
                            修改
                        </button>
                        <button class="btn btn-danger" name="delete" value="<?= $row->id()?>">
                            刪除
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </form>
</div>
