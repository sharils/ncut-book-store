<?php
require_once 'controllers/search/list.php';
require_once 'views/course/Method.php';
?>
<div class ="col-9 center">
    <?php if ($selected === FALSE): ?>
        <div class="alert alert-danger"><?=$msg?></div>
    <?php endif; ?>
    <ul class="nav nav-tabs">
        <li class="<?= $active['class'] ?>"><a href="<?= Router::toUrl('home/class/search')?>">依班級</a></li>
        <li class="<?= $active['course'] ?>"><a href="<?= Router::toUrl('home/course/search')?>">依課程</a></li>
        <li class="<?= $active['book'] ?>"><a href="<?= Router::toUrl('home/book/search')?>">依書籍</a></li>
    </ul>
    <table class="table center">
        <form action="<?= Router::toUrl("home/{$page}/search"); ?>" class="form-horizontal" method="get">
            <tr>
                <td colspan="11">
                    <?php require_once "views/search/{$page}.php"; ?>
                </td>
            </tr>
       </form>
        <tr class="active">
            <th>學年</th>
            <th>班級</th>
            <th>課程名稱</th>
            <th>老師</th>
            <th>書名(版本)</th>
            <th>作者</th>
            <th>ISBN</th>
            <th>出版社</th>
            <th>定價</th>
            <th>售價</th>
            <th>功能</th>
        </tr>
        <form action="<?= Router::toUrl('controllers/search/add_cart.php'); ?>" method="post">
            <div><input name="page" type="hidden" value="<?=$page?>"/></div>
            <?php foreach($coursebooks as $coursebook): ?>
                <tr>
                    <td>
                        <?=
                            htmlspecialchars(
                                $coursebook->course()->year().
                                Parameter::$semester[$coursebook->course()->semester()][1]
                            );
                        ?>
                    </td>
                    <td>
                        <?=
                            htmlspecialchars(
                                Parameter::$system[$coursebook->course()->system()][1].
                                Parameter::$department[$coursebook->course()->department()][1].
                                Parameter::$grade[$coursebook->course()->grade()][1].
                                Parameter::$group[$coursebook->course()->group()]
                            );
                        ?>
                    </td>
                    <td><?= htmlspecialchars($coursebook->course()->name()) ?></td>
                    <td><?= htmlspecialchars($coursebook->course()->teacher()->name()) ?></td>
                    <td><?= htmlspecialchars($coursebook->book()->name() .'('.$coursebook->book()->version().')') ?></td>
                    <td><?= htmlspecialchars($coursebook->book()->author()) ?></td>
                    <td><?= htmlspecialchars($coursebook->book()->isbn()) ?></td>
                    <td><?= htmlspecialchars($coursebook->book()->publisher()->name()) ?></td>
                    <td><?= htmlspecialchars($coursebook->book()->marketprice()) ?></td>
                    <td><?= htmlspecialchars($coursebook->book()->price()) ?></td>
                    <td>
                        <?php if($role === 'student'): ?>
                            <button class="btn btn-warning" name="book_id" value="<?= $coursebook->book()->id() ?>"><?= htmlspecialchars($button[1]) ?></button>
                        <?php else: ?>
                            <a class="btn btn-warning" href="<?= Router::toUrl("home/book/{$coursebook->book()->id()}")?>">修改書籍</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
       </form>
    </table>
</div>
