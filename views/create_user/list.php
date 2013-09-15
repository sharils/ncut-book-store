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
                <?php foreach ($args as $k => $v): ?>
                    <td><?= $v[0] ?></td>
                <?php endforeach; ?>
                <?php if ($user_role === 'admin'): ?>
                    <td>功能</td>
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
                        <td><?= $str ?></td>
                    <?php endforeach; ?>
                    <?php if ($user_role === 'admin'): ?>
                        <td>
                            <button class="btn btn-warning" name="update" value="<?= $row->id()?>">
                                修改
                            </button>
                            <button class="btn btn-danger" name="delete" value="<?= $row->id()?>">
                                刪除
                            </button>
                        </td>
                    <?php endif; ?>

                </tr>
            <?php endforeach; ?>
        </table>
    </form>
</div>
