<?php
require_once '../../models/Admin.php';
require_once '../../models/Clerk.php';
require_once '../../models/Password.php';
require_once '../../models/Student.php';
require_once '../../models/Teacher.php';
class User
{
	private static $CHANGEPWD_SELECTION = "SELECT `user`.pwd, salt FROM `user` WHERE `id` = :id";
	private static $DELETION = "DELETE FROM `user` WHERE id = :id";
	private static $FIND_SELECTION = "SELECT * FROM `user` WHERE id = :id";
	private static $INSERTION = "INSERT INTO `user` (id, pwd, salt) VALUE (:id, :pwd, :salt)";
	private static $UPDATE = "UPDATE `user` SET `pwd` = :pwd, `salt` = :salt WHERE `id` = :id";
	

	private $id;
	private $role;

	public static function authenticate($sn, $type, $password)
	{
		$result = Database::execute(
			"SELECT `user`.id, pwd, salt
			FROM `user` INNER JOIN `$type` ON `user`.id = `$type`.user_id
			WHERE `$type`.sn = :sn",
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
		$pwd = Password::create($password);
		$user = new self();
		$id = time();
		$user->id = $id;

		Database::execute(
			self::$INSERTION,
			array(
				':id' => $id,
				':pwd' => $pwd->password(),
				':salt' => $pwd->salt()
			)
		);
		return $user;
	}

	public static function find($idorsn)
	{
		$table = array('teacher', 'student', 'admin', 'clerk');
		foreach ($table as $type) {
			$result = Database::execute(
				"SELECT `user`.id FROM `user`
				INNER JOIN `$type` ON `user`.id = `$type`.user_id
				WHERE `$type`.sn = :sn OR `$type`.user_id = :user_id ",
				array(
					':sn' => $idorsn,
					':user_id' => $idorsn
				)
			);
			if (!empty($result)){
				$user = new self();
				$user->role = $type;
				$user->id = $result[0]['id'];
				break;
			}
		}
		return $user;
	}

	public static function from($id)
	{
		$user = new self();
		$row = Database::execute(
			self::$FIND_SELECTION,
			array(
				':id' => $id
			)
		);
		$user->id = $row[0]['id'];
		return $user;
	}

	public function changePassword($password, $new_password)
	{
		$result = Database::execute(
			self::$CHANGEPWD_SELECTION,
			array(':id' => $this->id())
		);
		$pwd = Password::from($result[0]['pwd'], $result[0]['salt']);

		if ($pwd->verify($password) === FALSE) {
			throw new Exception('Password is wrong');
		};

		$new_pwd = Password::create($new_password);
		Database::execute(
			self::$UPDATE,
			array(
				':pwd' => $new_pwd->password(),
				':id' => $this->id,
				':salt' => $new_pwd->salt()
			)
		);
	}

	public function delete()
	{
		Database::execute(
			self::$DELETION,
			array(':id' => $this->id)
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

	public function role()
	{
		return $this->role;
	}

	public function torole()
	{
		$role = $this->role();
		$role = ucfirst($role);
		return $role::from($this);
	}
}