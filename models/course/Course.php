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
            `department`,
            `grade`,
            `group`,
            `name`,
            `system`,
            'semester',
            `year`
        ) VALUE (
            :id,
            :teacher_id,
            :sn,
            :type,
            :department,
            :grade,
            :group,
            :name,
            :system,
            'semester',
            :year
        )";

    private $course_id;
    private $name;
    private $sn;
    private $teacher;
    private $type;
    private $year;

    public static function create(Teacher $teacher, $sn, $type, $department, $grade, $group, $name, $system, $semester, $year)
    {
        $course_id = time();
        Database::execute(
            self::$INSERTION,
            array(
                ':id' => $course_id,
                ':teacher_id' => $teacher->id(),
                ':sn' => $sn,
                ':type' => $type,
                ':department' => $department,
                ':grade' => $grade,
                ':group' => $group,
                ':name' => $name,
                ':system' => $system,
                ':semester' => $semester,
                ':year' => $year
            )
        );
        return new self($course_id, $teacher, $sn, $type, $department, $grade, $group, $name, $system, $semester, $year);
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
                $row['department'],
                $row['grade'],
                $row['group'],
                $row['name'],
                $row['system'],
                $row['semester'],
                $row['year']
            );
        }
        return $courses;
    }

    private function __construct($id, $teacher, $sn, $type, $department, $grade, $group, $name, $system, $semester, $year)
    {
        $this->course_id = $id;
        $this->teacher = $teacher;
        $this->sn = $sn;
        $this->type = $type;
        $this->department = $department;
        $this->grade = $grade;
        $this->group = $group;
        $this->name = $name;
        $this->system = $system;
        $this->semester = $semester;
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

    public function department()
    {
        return $this->department;
    }

    public function grade()
    {
        return $this->grade;
    }

    public function group()
    {
        return $this->group;
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

    public function system()
    {
        return $this->system;
    }

    public function semester()
    {
        return $this->semester;
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
