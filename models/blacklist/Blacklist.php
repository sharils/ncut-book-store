<?php
class Blacklist
{
	private static $DELETION ="DELETE FROM `blacklist`
		WHERE `user_id` = :id
		AND `black_user_id` = :black_user";
	private static $INSERTION = "INSERT INTO `blacklist` (
			`user_id`,
			`black_user_id`
		) VALUE (
			:id,
			:black_user
		)";
	private static $SELECTION ="SELECT `black_user_id`
		FROM `blacklist`
		WHERE `user_id` = :id";

	private $id;
	public static function from($user)
	{
		$blacklist = new self();
		$blacklist->id = $user->id();
		return $blacklist;
	}

	public function add($black_user)
	{
		Database::execute(
			self::$INSERTION,
			array(
				':id' => $this->id,
				':black_user' => $black_user->id()
			)
		);
	}

	public function blackUsers()
	{
		$users = array();
		$result = Database::execute(
			self::$SELECTION,
			array(
				':id' => $this->id
			)
		);

		foreach ($result as $row) {
			$users[] = User::from($row['black_user_id']);
		}
		return $users;
	}

	public function remove($black_user)
	{
		Database::execute(
			self::$DELETION,
			array(
				':id' => $this->id,
				':black_user' => $black_user->id()
			)
		);
	}
}