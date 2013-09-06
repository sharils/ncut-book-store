<?php
require_once 'controllers/welcome/welcome.php';
class Welcome
{
	public static function newSelf($role){
		new Welcome($role);
	}

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
				<li><a href="<?= Router::toUrl('views/welcome/welcome.php'); ?>">廠商資料</a></li>
				<li><a href="<?= Router::toUrl('views/shopbook/list.php'); ?>">書籍管理</a></li>
				<li><a href="<?= Router::toUrl('views/welcome/welcome.php'); ?>">訂單管理</a></li>
				<li><a href="<?= Router::toUrl('views/welcome/welcome.php'); ?>">課程書單</a></li>
			</ul>
		<?php
	}

	private function __construct($role)
	{
		$this->top();
		$this->common();
		$this->$role();
		$this->under();
	}

	private function common()
	{
		?>
			<ul class="nav">
				<li><a href="<?= Router::toUrl('views/message/creation.php'); ?>">寫信</a></li>
				<li><a href="<?= Router::toUrl('views/message/list.php?page=receive'); ?>">收件匣</a></li>
				<li><a href="<?= Router::toUrl('views/message/list.php?page=spam'); ?>">垃圾匣</a></li>
				<li><a href="<?= Router::toUrl('views/message/list.php?page=send'); ?>">寄件匣</a></li>
				<li><a href="<?= Router::toUrl('views/blacklist/blacklist.php'); ?>">黑名單</a></li>
				<li><a href="<?= Router::toUrl('views/password_update.php'); ?>">修改密碼</a></li>
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


	private function top()
	{
		?>
		<div class="container">
			<div class="col-sm-3 sidebar-offcanvas" id="sidebar">
				<div class="well sidebar-nav">
		<?php
	}

	private function under()
	{
		?>
				</div>
			</div>
		</div>
		<?php
	}
}
