<?php
class Blacklist
{
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
			" INSERT INTO blacklist(user_id, black_user_id)
			VALUE (:id, :black_user) ",
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
			" SELECT black_user_id FROM blacklist WHERE user_id = :id ",
			array(
				':id' => $this->id
			)
		);

		foreach ($result as $row) {
			$user = User::from($row['black_user_id']);
			$users[] = $user;
		}
		return $users;
	}

	public function remove($black_user)
	{
		Database::execute(
			" DELETE FROM blacklist WHERE user_id = :id AND black_user_id = :black_user ",
			array(
				':id' => $this->id,
				':black_user' => $black_user->id()
			)
		);
	}
}