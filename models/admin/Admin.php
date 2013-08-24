<?php
class Admin
{
	private static $DELETION = "DELETE FROM admin WHERE user_id = :id";
	private static $FROM_SELECTION = "SELECT * FROM admin WHERE user_id = :id";
	private static $INSERTION = "INSERT INTO admin(
			user_id,
			sn,
			email,
			phone,phone_ext
		) VALUE (
			:id,
			:sn,
			:email,
			:phone,
			:phone_ext
		)";
	private static $UPDATE = "UPDATE admin SET email = :email WHERE user_id = :id";

	private $email;
	private $id;
	private $phone;
	private $phone_ext;
	private $sn;

	public static function create($user, $sn, $email, $phone, $phone_ext)
	{
		Database::execute(
			self::$INSERTION,
			array(
				':id' => $user->id(),
				':sn' => $sn,
				':email' => $email,
				':phone' => $phone,
				':phone_ext' => $phone_ext
			)
		);
		$admin = new self($user->id(), $sn, $email, $phone, $phone_ext);
		return $admin;
	}

	public static function from($user)
	{
		$result = Database::execute(
			self::$FROM_SELECTION,
			array(
				':id' => $user->id()
			)
		);

		foreach ($result as $row) {
			$admin = new self(
				$row['user_id'],
				$row['sn'],
				$row['email'],
				$row['phone'],
				$row['phone_ext']
			);
		}
		return $admin;
	}

	public function create_user()
	{
		$args = func_get_args();
		$user = User::create($args[1]);
		$input = array_splice($args, 0, 2, array($user));
		return call_user_func_array(array($input[0],'create'), $args);
	}

	public function __construct($id, $sn, $email, $phone, $phone_ext)
	{
		$this->id = $id;
		$this->sn = $sn;
		$this->email = $email;
		$this->phone = $phone;
		$this->phone_ext = $phone_ext;
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
		if ($email === NULL) {
			return $this->email;
		} else {
			return $this->email = $email;
		}
	}

	public function id()
	{
		return $this->id;
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
			array(
				':email' => $this->email,
				':id' => $this->id
			)
		);
	}
}