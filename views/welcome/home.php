<?php
require_once "models/router/router.php";
class Home
{
    private function admin()
    {
        ?>
            <ul class="nav">
                <li><a href="<?= Router::toUrl('views/course/course_creation.php'); ?>">建立課程</a></li>
                <li><a href="<?= Router::toUrl('views/create_user/create_clerk.php'); ?>">建立員生社</a></li>
                <li><a href="<?= Router::toUrl('views/create_user/create_student.php'); ?>">建立學生</a></li>
                <li><a href="<?= Router::toUrl('views/create_user/create_teacher.php'); ?>">建立老師</a></li>
            </ul>
        <?php
    }

    private function clerk()
    {
        ?>
            <ul class="nav">
                <li><a href="<?= Router::toUrl('views/publisher/create.php'); ?>">建立廠商</a></li>
                <li><a href="<?= Router::toUrl('views/publisher/list.php'); ?>">廠商資料</a></li>
                <li><a href="<?= Router::toUrl('views/shopbook/list.php'); ?>">書籍管理</a></li>
                <li><a href="<?= Router::toUrl('views/clerk/order_list.php'); ?>">訂單管理</a></li>
                <li><a href="<?= Router::toUrl('views/welcome/welcome.php'); ?>">課程書單</a></li>
            </ul>
        <?php
    }
    private function student()
    {
        ?>
            <ul class="nav">
                <li><a href="<?= Router::toUrl('views/student_order/listing.php'); ?>">訂單管理</a></li>
                <li><a href="<?= Router::toUrl('views/student_order/cart.php'); ?>">購物車</a></li>
            </ul>
        <?php
    }

    private function teacher()
    {
        ?>
            <ul class="nav">
                <li><a href="<?= Router::toUrl('views/welcome/welcome.php'); ?>">課程書單</a></li>
            </ul>
        <?php
    }
}
