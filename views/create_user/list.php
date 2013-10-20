<?php require_once 'controllers/user/list.php';?>
<div class ="col-9 center">
    <ul class="nav nav-tabs">
        <li class="<?= $active['clerk'] ?>"><a href="<?= Router::toUrl('home/clerk/list')?>">員生社</a></li>
        <li class="<?= $active['student'] ?>"><a href="<?= Router::toUrl('home/student/list')?>">學生</a></li>
        <li class="<?= $active['teacher'] ?>"><a href="<?= Router::toUrl('home/teacher/list')?>">老師</a></li>
        <li class="<?= $active['admin'] ?>"><a href="<?= Router::toUrl('home/admin/list')?>">管理者</a></li>
    </ul>
    <form action="<?= Router::toUrl('controllers/user/update_or_delete.php') ?>"  method="post">
        <table class="table center">
            <tr>
                <?php foreach ($args as $k => $v): ?>
                    <th><?= htmlspecialchars($v[0]) ?></th>
                <?php endforeach; ?>
                <?php if ($user_role === 'admin'): ?>
                    <th>功能</th>
                <?php endif; ?>
            </tr>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <?php foreach ($args as $k => $v_arg): ?>
                        <?php
                            if(in_array($k, $drop)){
                                $array = Parameter::${$k};
                                $str = ($k === 'group') ?  $array[$row->$k()] : $array[$row->$k()][0];
                            } else {
                                $str = $row->$k();
                            }
                        ?>
                        <td><?= htmlspecialchars($str) ?></td>
                    <?php endforeach; ?>
                    <?php if ($user_role === 'admin'): ?>
                        <td>
                            <button class="btn btn-warning" name="update" value="<?= htmlspecialchars($row->id())?>">
                                修改
                            </button>
                            <button class="btn btn-danger" name="delete" value="<?= htmlspecialchars($row->id())?>">
                                刪除
                            </button>
                        </td>
                    <?php endif; ?>

                </tr>
            <?php endforeach; ?>
        </table>
    </form>
</div>
