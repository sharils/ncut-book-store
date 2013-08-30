<?php
class Teacher
{
	private static $DELETION = "DELETE FROM `teacher` WHERE `user_id` = :id";
	private static $INSERTION = "INSERT INTO `teacher` (
			`user_id`,
			`sn`,
			`email`,
			`name`,
			`phone`,
			`phone_ext`
		) VALUE (
			:id,
			:sn,
			:email,
			:name,
			:phone,
			:phone_ext
		)";
	private static $FIND_SELECTION = "SELECT * FROM `teacher`";
	private static $FROM_SELECTION = "SELECT * FROM `teacher`
		WHERE `user_id` = :id";
	private static $UPDATE = "UPDATE `teacher`
		SET `email` = :email
		WHERE `user_id` = :id";

	private $email;
	private $id;
	private $name;
	private $phone;
	private $phone_ext;
	private $sn;

	public static function create($user, $sn, $email, $name, $phone, $phone_ext)
	{
		Database::execute(
			self::$INSERTION,
			array(
				':id' => $user->id(),
				':sn' => $sn,
				':email' => $email,
				':name' => $name,
				':phone' => $phone,
				':phone_ext' => $phone_ext
			)
		);

		return new self($user->id(), $sn, $email, $name, $phone, $phone_ext);
	}

	public static function find()
	{
		$result = Database::execute(self::$FIND_SELECTION);

		return self::refine($result);
	}

	public static function from($user)
	{
		$result = Database::execute(
			self::$FROM_SELECTION,
			array(
				':id' => $user->id()
			)
		);
		$teachers = self::refine($result);
		return $teachers[0];
	}

	private static function refine($result)
	{
		$teachers = array();
		foreach ($result as $row) {
			$teachers[] = new self(
				$row['user_id'],
				$row['sn'],
				$row['email'],
				$row['name'],
				$row['phone'],
				$row['phone_ext']
			);
		}
		return $teachers;
	}

	private function __construct($id, $sn, $email, $name, $phone, $phone_ext)
	{
		$this->email = $email;
		$this->id = $id;
		$this->name = $name;
		$this->phone = $phone;
		$this->phone_ext = $phone_ext;
		$this->sn = $sn;
	}

	public function delete()
	{
		Database::execute(
			self::$DELETION,
			array(
				':id' => $this->id
			)
		);
	}

	public function email($email=NULL)
	{
		if (empty($email)) {
			return $this->email;
		} else {
			return $this->email = $email;
		}
	}

	public function id()
	{
		return $this->id;
	}

	public function name()
	{
		return $this->name;
	}

	public function phone()
	{
		return $this->phone;
	}

	public function phone_ext()
	{
		return $this->phone_ext;
	}

	public function sn()
	{
		return $this->sn;
	}

	public function update()
	{
		Database::execute(
			self::$UPDATE,
			array (
				':email' => $this->email,
				':id' => $this->id
			)
		);
	}
}