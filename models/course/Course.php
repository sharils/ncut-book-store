<?php
Class Course
{
	private static $COURSEID_SELECTION = "SELECT * FROM `course` WHERE `id` = :id";
	private static $DELETION = "DELETE FROM `course` WHERE `id` = :id";
	private static $FIND_SELECTION = "SELECT * FROM `course` WHERE  `teacher_user_id` = :teacher_id";
	private static $INSERTION = "INSERT INTO `course`(
			`id`,
			`teacher_user_id`,
			`sn`,
			`type`,
			`name`,
			`year`
		) VALUE (
			:id,
			:teacher_id,
			:sn,
			:type,
			:name,
			:year
		)";

	private $course_id;
	private $name;
	private $sn;
	private $teacher;
	private $type;
	private $year;

	public static function create(Teacher $teacher, $sn, $type, $name, $year)
	{
		$course_id = time();
		Database::execute(
			self::$INSERTION,
			array(
				':id' => $course_id,
				':teacher_id' => $teacher->id(),
				':sn' => $sn,
				':type' => $type,
				':name' => $name,
				':year' => $year
			)
		);
		return new self($course_id, $teacher, $sn, $type, $name, $year);
	}

	public static function from($course_id)
	{
		$result = Database::execute(
			self::$COURSEID_SELECTION,
			array(
				':id' => $course_id
			)
		);

		$user = User::from($result[0]['teacher_user_id']);
		$teacher = Teacher::from($user);
		return new self($course_id, $teacher, $result[0]['sn'], $result[0]['type'], $result[0]['name'], $result[0]['year']);
	}

	private function __construct($course_id, $teacher, $sn, $type, $name, $year)
	{
		$this->course_id = $course_id;
		$this->teacher = $teacher;
		$this->sn = $sn;
		$this->type = $type;
		$this->name = $name;
		$this->year = $year;
	}

	public function books()
	{
		return CourseBook::find($this);
	}

	public function delete()
	{
		Database::execute(
			self::$DELETION,
			array(
				':id' => $this->course_id
			)
		);
	}
	public static function find($teacher)
	{
		$result = Database::execute(
			self::$FIND_SELECTION,
			array(
				':teacher_id' => $teacher->id()
			)
		);
		return self::refine($result);
	}
	public function id()
	{
		return $this->course_id;
	}

	public function name()
	{
		return $this->name;
	}
	
	public static function refine($rows)
	{
		$course = array();
		foreach ($rows as $row) {

			$course[] = new self(
				$course_id,
				$teacher,
				$type,
				$name,
				$year
			);
		}
		return $course;
	}

	public function sn()
	{
		return $this->sn;
	}

	public function teacher()
	{
		return $this->teacher;
	}

	public function type()
	{
		return $this->type;
	}

	public function year()
	{
		return $this->year;
	}
}