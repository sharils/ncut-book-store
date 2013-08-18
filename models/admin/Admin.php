<?php
class Admin
{
	private $email;
	private $id;
	private $phone;
	private $phone_ext;
	private $sn;

	public static function create($user, $sn, $email, $phone, $phone_ext)
	{
		Database::execute(
			" INSERT INTO admin(user_id, sn, email, phone, phone_ext)
			VALUE (:id, :sn, :email, :phone, :phone_ext)",
			array(
				':id' => $user->id(),
				':sn' => $sn,
				':email' => $email,
				':phone' => $phone,
				':phone_ext' => $phone_ext
			)
		);

		$admin = new self();
		$admin->save($user->id(), $sn, $email, $phone, $phone_ext);
		return $admin;
	}

	public static function from($user)
	{
		$result = Database::execute(
			" SELECT * FROM admin WHERE user_id = :id ",
			array(
				':id' => $user->id()
			)
		);

		$admin = new self();
		foreach ($result as $row) {
			$admin->save(
				$row['user_id'],
				$row['sn'],
				$row['email'],
				$row['phone'],
				$row['phone_ext']
			);
		}
		return $admin;
	}

	public function delete()
	{
		Database::execute(
			" DELETE FROM admin WHERE user_id = :id ",
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

	public function phone()
	{
		return $this->phone;
	}

	public function phone_ext()
	{
		return $this->phone_ext;
	}

	private function save($id, $sn, $email, $phone, $phone_ext)
	{
		$this->id = $id;
		$this->sn = $sn;
		$this->email = $email;
		$this->phone = $phone;
		$this->phone_ext = $phone_ext;
	}

	public function sn()
	{
		return $this->sn;
	}

	public function update()
	{
		Database::execute(
			" UPDATE admin SET email = :email WHERE user_id = :id ",
			array(
				':email' => $this->email,
				':id' => $this->id
			)
		);
	}
}