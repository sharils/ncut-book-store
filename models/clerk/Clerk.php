<?php
class Clerk
{
	private $email;
	private $id;
	private $name;
	private $phone;
	private $phone_ext;
	private $sn;

	public static function create($user, $sn, $email, $name, $phone, $phone_ext)
	{
		Database::execute(
			" INSERT INTO clerk(user_id, sn, email, name, phone, phone_ext)
			VALUE (:id, :sn, :email, :name, :phone, :phone_ext) ",
			array(
				':id' => $user->id(),
				':sn' => $sn,
				':email' => $email,
				':name' => $name,
				':phone' => $phone,
				':phone_ext' => $phone_ext
			)
		);

		$clerk = new self();
		$clerk->save($user->id(), $sn, $email, $name, $phone, $phone_ext);
		return $clerk;
	}

	public static function from($user)
	{
		$result = Database::execute(
			" SELECT * FROM clerk WHERE user_id = :id ",
			array(
				':id' => $user->id()
			)
		);

		$clerk = new self();
		foreach ($result as $row) {
			$clerk->save(
				$row['user_id'],
				$row['sn'],
				$row['email'],
				$row['name'],
				$row['phone'],
				$row['phone_ext']
			);
		}
		return $clerk;
	}

	public function delete()
	{
		Database::execute(
			" DELETE FROM clerk WHERE user_id = :id ",
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

	private function save($id, $sn, $email, $name, $phone, $phone_ext)
	{
		$this->id = $id;
		$this->sn = $sn;
		$this->email = $email;
		$this->name = $name;
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
			" UPDATE clerk SET email = :email WHERE user_id = :id ",
			array(
				':email' => $this->email,
				':id' => $this->id
			)
		);
	}
}