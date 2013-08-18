<?php
require_once 'Password.php';

class User
{
	private $id;
	private $table = array('teacher', 'student', 'admin', 'clerk');

	public static function authenticate($sn, $type, $password)
	{
		$result = Database::execute(
			" SELECT `user`.id, pwd, salt
			FROM `user` INNER JOIN `$type` ON `user`.id = `$type`.user_id
			WHERE `$type`.sn = :sn ",
			array(
				':sn' => $sn
			)
		);

		if (empty($result)) {
			throw new Exception('No result');
		}
		$user = new self();
		$user->id = $result[0]['id'];
		$pwd = Password::from($result[0]['pwd'], $result[0]['salt']);

		if ($pwd->verify($password) === FALSE) {
			throw new Exception('Password is wrong');
		};
		return $user;
	}

	public static function create($password)
	{
		$user = new self();
		$id = time();
		$user->id = $id;

		Database::execute(
			" INSERT INTO `user`(id, pwd) VALUE (:id, :pwd)",
			array(
				':id' => $id,
				':pwd' => $password
			)
		);
		return $user;
	}

	public static function from($id)
	{
		$user = new self();
		$row = Database::execute(
			" SELECT * FROM `user` WHERE id = :id ", array(':id' => $id)
		);

		$user->id = $row[0]['id'];
		return $user;
	}

	public function delete()
	{
		Database::execute(
			" DELETE FROM `user` WHERE id = :id ",
			array(
				':id' => $this->id
			)
		);
	}
	public function changePassword ($password, $new_password)
	{
		$result = Database::execute(
			" SELECT `user`.pwd, salt FROM `user` WHERE `id` = :id ",
			array(
				':id' => $this->id()
			)
		);
		$pwd = Password::from($result[0]['pwd'], $result[0]['salt']);

		if ($pwd->verify($password) === FALSE) {
			throw new Exception('Password is wrong');
		};
		$new_pwd = Password::create($new_password);
		Database::execute(
			"UPDATE `user` SET `pwd` = :pwd, `salt` = :salt WHERE `id` = :id",
			array(
				':pwd' => $new_pwd->password(),
				':id' => $this->id,
				':salt' => $new_pwd->salt()
			)
		);
	}

	public function id()
	{
		return $this->id;
	}
}