<?php
class Student
{
	private $class;
	private $department;
	private $email;
	private $id;
	private $name;
	private $phone;
	private $sn;
	private $type;
	private $year;

	public static function create($user, $sn, $email, $class, $department, $name, $type, $phone, $year)
	{
		Database::execute(
			" INSERT INTO student(user_id, sn, email, class, department, name, type, phone, year)
			VALUE (:id, :sn, :email, :class, :department, :name, :type, :phone, :year) ",
			array(
				':id' => $user->id(),
				':sn' => $sn,
				':email' => $email,
				':class' => $class,
				':department' => $department,
				':name' => $name,
				':type' => $type,
				':phone' => $phone,
				':year' => $year
			)
		);
		$student = new self();
		$student->save(
			$user->id(),
			$sn,
			$email,
			$class,
			$department,
			$name,
			$type,
			$phone,
			$year
		);
		return $student;
	}

	public static function from($user)
	{
		$result = Database::execute(
			" SELECT * FROM student WHERE user_id = :id ",
			array(
				':id' => $user->id()
			)
		);

		$student = new self();
		foreach ($result as $row) {
			$student->save(
				$row['user_id'],
				$row['sn'],
				$row['email'],
				$row['class'],
				$row['department'],
				$row['name'],
				$row['type'],
				$row['phone'],
				$row['year']
			);
		}
		return $student;
	}

	public function delete()
	{
		Database::execute(
			" DELETE FROM student WHERE user_id = :id " ,
			array(
				':id' => $this->id
			)
		);
	}

	public function department()
	{
		return $this->department;
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

	private function save($id, $sn, $email, $class, $department, $name, $type, $phone, $year)
	{
		$this->id = $id;
		$this->sn = $sn;
		$this->email = $email;
		$this->class = $class;
		$this->department = $department;
		$this->name = $name;
		$this->type = $type;
		$this->phone = $phone;
		$this->year = $year;
	}

	public function sn()
	{
		return $this->sn;
	}

	public function team()
	{
		return $this->class;
	}

	public function type()
	{
		return $this->type;
	}

	public function update()
	{
		Database::execute(
			" UPDATE student SET email = :email WHERE user_id = :id ",
			array (
				':email' => $this->email,
				':id' => $this->id
			)
		);
	}

	public function year()
	{
		return $this->year;
	}
}