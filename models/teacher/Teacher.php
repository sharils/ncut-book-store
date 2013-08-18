<?php
class Teacher
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
			" INSERT INTO teacher(user_id, sn, email, name, phone, phone_ext)
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

		$teacher = new self();
		$teacher->save($id, $sn, $email, $name, $phone, $phone_ext);
		return $teacher;
	}

	public static function from($user)
	{
		$result = Database::execute(
			" SELECT * FROM teacher WHERE user_id = :id ",
			array(
				':id' => $user->id()
			)
		);

		$teacher = new self();
		foreach ($result as $row) {
			$teacher->save(
				$row['user_id'],
				$row['sn'],
				$row['email'],
				$row['name'],
				$row['phone'],
				$row['phone_ext']
			);
		}
		return $teacher;
	}

	public function delete()
	{
		Database::execute(
			" DELETE FROM teacher WHERE user_id = :id ",
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
			" UPDATE teacher SET email = :email WHERE user_id = :id ",
			array (
				':email' => $this->email,
				':id' => $this->id
			)
		);
	}
}