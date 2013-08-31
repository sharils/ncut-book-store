<?php
require_once 'models/clerk/clerk.php';
class Method
{
	public static function selectList($role)
	{
		$args = array();
		$rows = $role::find();
		foreach ($rows as $row) {
			$args[$row->id()] = $row->name() . '(' . $row->sn() . ')';
		}
		return $args;
	}
}
