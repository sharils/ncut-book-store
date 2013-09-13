<?php require_once 'controllers/user/user_form.php'; ?>
<div class ="col-lg-9 col-sm-9 center">
    <?php if (null !== Notice::get()): ?>
        <div class="alert alert-danger"><?=Notice::get()?></div>
    <?php endif; ?>
    <?php if ($account === FALSE): ?>
        <ul class="nav nav-tabs">
            <li class="<?= $active['clerk'] ?>"><a href="<?= Router::toUrl('home/clerk/new')?>">員生社</a></li>
            <li class="<?= $active['student'] ?>"><a href="<?= Router::toUrl('home/student/new')?>">學生</a></li>
            <li class="<?= $active['teacher'] ?>"><a href="<?= Router::toUrl('home/teacher/new')?>">老師</a></li>
        </ul>
    <?php endif;?>
    <form action="<?= Router::toUrl('controllers/user/create_or_update.php') ?>"  method="post">
        <?php if ($account === TRUE): ?>
            <h3>個人資料</h3>
        <?php endif;?>
        <table class="table table-bordered center">
            <input class="form-control" name="id" type="hidden" value="<?= $id ?>"/>
            <input class="form-control" name="role" type="hidden" value="<?= Create::$title[1] ?>"/>
            <tr>
                <td>
                <?php foreach ($args as $key => $value): ?>
                    <?php $disabled = (in_array($key, $flag))? 'disabled ' : '' ?>
                    <div class="form-group">
                        <label class="col-lg-5 col-sm-5 control-label"><?= $value[0] ?></label>
                        <div class="col-lg-5 col-sm-5">
                            <input class="form-control" <?= $disabled ?> name="<?= $key ?>" type="<?= $value[1] ?>" value="<?= $value[2] ?>"/>
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
