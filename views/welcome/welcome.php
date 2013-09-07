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
				<li><a href="<?= Router::toUrl('home/course'); ?>">建立課程</a></li>
				<li><a href="<?= Router::toUrl('home/clerk/new'); ?>">建立員生社</a></li>
				<li><a href="<?= Router::toUrl('home/student/new'); ?>">建立學生</a></li>
				<li><a href="<?= Router::toUrl('home/teacher/new'); ?>">建立老師</a></li>
			</ul>
		<?php
	}

	private function clerk()
	{
		?>
			<ul class="nav">
				<li><a href="<?= Router::toUrl('home'); ?>">廠商資料</a></li>
				<li><a href="<?= Router::toUrl('home/shop_book'); ?>">書籍管理</a></li>
				<li><a href="<?= Router::toUrl('home'); ?>">訂單管理</a></li>
				<li><a href="<?= Router::toUrl('home'); ?>">課程書單</a></li>
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
				<li><a href="<?= Router::toUrl('message/new'); ?>">寫信</a></li>
				<li><a href="<?= Router::toUrl('message/received'); ?>">收件匣</a></li>
				<li><a href="<?= Router::toUrl('message/spam'); ?>">垃圾匣</a></li>
				<li><a href="<?= Router::toUrl('message/sent'); ?>">寄件匣</a></li>
				<li><a href="<?= Router::toUrl('message/blacklist'); ?>">黑名單</a></li>
				<li><a href="<?= Router::toUrl('account/update'); ?>">修改密碼</a></li>
			</ul>
		<?php
	}

	private function student()
	{
		?>
			<ul class="nav">
				<li><a href="<?= Router::toUrl('home/order'); ?>">訂單管理</a></li>
				<li><a href="<?= Router::toUrl('home/order/cart'); ?>">購物車</a></li>
			</ul>
		<?php
	}

	private function teacher()
	{
		?>
			<ul class="nav">
				<li><a href="<?= Router::toUrl('home'); ?>">課程書單</a></li>
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
