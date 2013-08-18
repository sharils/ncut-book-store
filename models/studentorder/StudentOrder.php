<?php
class StudentOrder
{
	private static $FIND_SELECTION = "SELECT * FROM `student_order` WHERE `student_user_id` = :student_id";
	private static $FROM_SELECTION = "SELECT * FROM `student_order` WHERE `id` = :id";
	private static $INSERTION = "INSERT INTO `student_order`(
			`id`,
			`student_user_id`,
			`date`
		) VALUE (
			:id,
			:student_user_id,
			:orderdate
		)";
	private static $UPDATE = "UPDATE `student_order`
		SET `clerk_user_id` = :clerk_id,
			`date` = :orderdate,
			`status` = :status
		WHERE id = :id";

	private $clerk;
	private $date;
	private $id;
	private $status;
	private $student;

	public static function create(Student $student, $date)
	{
		$id = time();
		Database::execute(
			self::$INSERTION,
			array(
				':id' => $id,
				'student_user_id' => $student->id(),
				':orderdate' => $date
			)
		);
		return new self('', $date, $id, '', $student);
	}

	public static function find(Student $student)
	{
		$result = Database::execute(
			self::$FIND_SELECTION,
			array(
				':student_id' => $student->id()
			)
		);
		return self::refine($result);
	}

	public static function from($student_order_id)
	{
		$result = Database::execute(
			self::$FROM_SELECTION,
			array(
				':id' => $student_order_id
			)
		);

		$StudentOrders = self::refine($result);
		return $StudentOrders[0];
	}

	private static function refine($result)
	{
		$StudentOrders = array();
		foreach ($result as $row) {
			$suser = USER::from($row['student_user_id']);
			$cuser = USER::from($row['student_user_id']);
			$StudentOrders[] = new self(Clerk::from($cuser), $row['date'], $row['id'], $row['status'], Student::from($suser));
			
		}
		return $StudentOrders;
	} 

	public function clerk(Clerk $clerk = NULL)
	{
		if (empty($clerk)) {
			return $this->clerk;
		} else {
			return $this->clerk = $clerk;
		}
	}

	private function __construct($clerk, $date, $id, $status, $student)
	{
		$this->clerk = $clerk;
		$this->date = $date;
		$this->id = $id;
		$this->status = $status;
		$this->student = $student;
	}

	public function date($date = NULL)
	{
		if (empty($date)) {
			return $this->date;
		} else {
			return $this->date = $date;
		}
	}

	public function id()
	{
		return $this->id;
	}

	public function status($status = NULL)
	{
		if (empty($status)) {
			return $this->status;
		} else {
			return $this->status = $status;
		}
	}

	public function student()
	{
		return $this->student;
	}

	public function update()
	{
		Database::execute(
			self::$UPDATE,
			array(
				':clerk_id' => empty($this->clerk) ? '' : $this->clerk()->id(),
				':orderdate' => $this->date(),
				':status' => $this->status(),
				':id' => $this->id()
			)
		);
	}
}