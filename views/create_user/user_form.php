<?php require_once 'controllers/user/user_form.php'; ?>
<?php require_once 'views/course/Method.php'; ?>
<div class ="col-9 center">
    <?php if (null !== Notice::get()): ?>
        <div class="alert alert-danger"><?=Notice::get()?></div>
    <?php endif; ?>
    <?php if ($account === FALSE): ?>
        <ul class="nav nav-tabs">
            <li class="<?= $active['clerk'] ?>"><a href="<?= Router::toUrl('home/clerk/new')?>">員生社</a></li>
            <li class="<?= $active['student'] ?>"><a href="<?= Router::toUrl('home/student/new')?>">學生</a></li>
            <li class="<?= $active['teacher'] ?>"><a href="<?= Router::toUrl('home/teacher/new')?>">老師</a></li>
            <li class="<?= $active['admin'] ?>"><a href="<?= Router::toUrl('home/admin/new')?>">管理者</a></li>
        </ul>
    <?php endif;?>
    <form action="<?= Router::toUrl('controllers/user/create_or_update.php') ?>"  method="post">
        <table class="table center">
        <?php if ($account === TRUE): ?>
            <th><?= $diff['status'].Create::$title[0]?></th>
        <?php endif;?>
            <input class="form-control" name="id" type="hidden" value="<?= $id ?>"/>
            <input class="form-control" name="role" type="hidden" value="<?= Create::$title[1] ?>"/>
            <tr>
                <td>
                <?php foreach ($args as $key => $value): ?>
                    <?php $disabled = (in_array($key, $flag))? 'disabled ' : '' ?>
                    <div class="form-group">
                        <label class="col-lg-5 col-sm-5 control-label"><?= htmlspecialchars($value[0]) ?></label>
                        <div class="col-lg-5 col-sm-5">
                            <?php $position = ($key === 'group') ? Null : 0 ?>
                            <?php if(in_array($key, $drop)): ?>
                                <?php Method::select($key, Parameter::${$key}, $position, $value[2], $disabled);?>
                            <?php else: ?>
                                <input class="form-control" <?= $disabled ?> name="<?= $key ?>" type="<?= $value[1] ?>" value="<?= htmlspecialchars($value[2]) ?>"/>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
               </td>
            </tr>
        </table>
        <p>
            <?php if ($resource === 'new'): ?>
                <input class="btn btn-warning" type="reset" value="重填"/>
            <?php endif; ?>
            <input class="btn <?= $diff['class'] ?>" type="submit" value="<?= $diff['status'] ?>"/>
        </p>
    </form>
</div>
