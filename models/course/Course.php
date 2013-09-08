<?php
require_once 'models/user/User.php';
require_once 'models/teacher/Teacher.php';
Class Course
{
	private static $FROM_SELECTION = "SELECT * FROM `course` WHERE `id` = :id";
	private static $FIND_COURSE_SELECTION ="SELECT * FROM `course`
		WHERE  `sn` = :sn OR `name` = :name";
	private static $DELETION = "DELETE FROM `course` WHERE `id` = :id";
	private static $FIND_SELECTION = "SELECT * FROM `course`
		WHERE  `teacher_user_id` = :teacher_id";
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
	public static function findCourse($sn_or_name)
	{
		$result = Database::execute(
			self::$FIND_COURSE_SELECTION,
			array(
				':sn' => $sn_or_name,
				':name' => $sn_or_name,
			)
		);
		$courses = self::refine($result);
		return $courses[0];
	}

	public static function from($course_id)
	{
		$result = Database::execute(
			self::$FROM_SELECTION,
			array(
				':id' => $course_id
			)
		);
		$courses = self::refine($result);
		return $courses[0];
	}

	private static function refine($result)
	{
		$courses = array();
		foreach ($result as $row) {
			$teacher = Teacher::from(User::from($row['teacher_user_id']));
			$courses[] = new self(
				$row['id'],
				$teacher,
				$row['sn'],
				$row['type'],
				$row['name'],
				$row['year']
			);
		}
		return $courses;
	}

	private function __construct($id, $teacher, $sn, $type, $name, $year)
	{
		$this->course_id = $id;
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

	public function toArray()
	{
		return array(
			'name' => $this->name,
			'type' => $this->type,
			'year' => $this->year
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
