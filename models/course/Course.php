<?php
Class Course
{
	private static  $COURSEID_SELECTION = "SELECT * FROM `course` WHERE `id` = :id";
	private static  $DELETION = "DELETE FROM `course` WHERE `id` = :id";
	private static  $INSERTION = "INSERT INTO `course`(
			`id`,
			`teacher_user_id`,
			`type`,
			`name`,
			`year`
		) VALUE (
			:id,
			:teacher_id,
			:type,
			:name,
			:year
		)";

	private $course_id;
	private $name;
	private $teacher;
	private $type;
	private $year;

	public static function create(Teacher $teacher, $type, $name, $year)
	{
		$course_id = time();
		Database::execute(
			self::$INSERTION,
			array(
				':id' => $course_id,
				':teacher_id' => $teacher->id(),
				':type' => $type,
				':name' => $name,
				':year' => $year
			)
		);
		return new self($course_id, $teacher, $type, $name, $year);
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
		return new self($course_id, $teacher, $result[0]['type'], $result[0]['name'], $result[0]['year']);
	}

	private function __construct($course_id, $teacher, $type, $name, $year)
	{
		$this->course_id = $course_id;
		$this->teacher = $teacher;
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

	public function id()
	{
		return $this->course_id;
	}

	public function name()
	{
		return $this->name;
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