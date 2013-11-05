<?php
require_once 'models/user/User.php';
require_once 'models/teacher/Teacher.php';
Class Course
{
    private static $DELETION = "DELETE FROM `course` WHERE `id` = :id";
    private static $FACTOR;
    private static $FIND_SELECTION ="SELECT * FROM `course`";
    private static $FROM_SELECTION = "SELECT * FROM `course` WHERE `id` = :id";
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
            `semester`,
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
            :semester,
            :year
        )";
    private static $UPDATE="UPDATE `course` SET
            `sn` = :sn,
            `teacher_user_id` = :teacher,
            `type` = :type,
            `department` = :department,
            `grade` = :grade,
            `group` = :group,
            `name` = :name,
            `system` = :system,
            `semester` = :semester,
            `year` = :year
        WHERE `id` = :id";

    private $course_id;
    private $name;
    private $sn;
    private $teacher;
    private $type;
    private $year;

    public static function create(Teacher $teacher, $sn, $type, $department, $grade, $group, $name, $system, $semester, $year)
    {
        $course_id = Database::getRandomId();
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

    public static function find($search_factor = [])
    {
        $where = self::getWhere($search_factor);
        $result = Database::execute(
            self::$FIND_SELECTION.$where,
            self::$FACTOR
        );
        if(empty($result)){
            return FALSE;
        }
        return self::refine($result);
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

    private static function getWhere($search_factor)
    {
        $args = [];
        $where = "WHERE 1";
        foreach($search_factor as $key => $value) {
            $where.=" AND `$key` LIKE :$key";
            $args[":$key"] = "%$value%";
        }
        self::$FACTOR = $args;
        return $where;
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
        return CourseBook::findCourse($this);
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

    public function department($department = NULL)
    {
        if ($department === NULL) {
            return $this->department;
        } else {
            return $this->department = $department;
        }
    }

    public function grade($grade = NULL)
    {
        if ($grade === NULL) {
            return $this->grade;
        } else {
            return $this->grade = $grade;
        }
    }

    public function group($group = NULL)
    {
        if ($group === NULL) {
            return $this->group;
        } else {
            return $this->group = $group;
        }
    }

    public function id()
    {
        return $this->course_id;
    }

    public function name($name = NULL)
    {
        if ($name === NULL) {
            return $this->name;
        } else {
            return $this->name = $name;
        }
    }

    public function sn($sn = NULL)
    {
        if ($sn === NULL) {
            return $this->sn;
        } else {
            return $this->sn = $sn;
        }
    }

    public function system($system = NULL)
    {
        if ($system === NULL) {
            return $this->system;
        } else {
            return $this->system = $system;
        }
    }

    public function semester($semester = NULL)
    {
        if ($semester === NULL) {
            return $this->semester;
        } else {
            return $this->semester = $semester;
        }
    }

    public function teacher($teacher = NULL)
    {
        if ($teacher === NULL) {
            return $this->teacher;
        } else {
            return $this->teacher = $teacher;
        }
    }

    public function type($type = NULL)
    {
        if ($type === NULL) {
            return $this->type;
        } else {
            return $this->type = $type;
        }
    }

    public function update()
    {
        Database::execute(
            self::$UPDATE,
            array(
                ':sn' => $this->sn,
                ':teacher' => $this->teacher->id(),
                ':type' => $this->type,
                ':department' => $this->department,
                ':grade' => $this->grade,
                ':group' => $this->group,
                ':name' => $this->name,
                ':system' => $this->system,
                ':semester' => $this->semester,
                ':year' => $this->year,
                ':id' => $this->id()
            )
        );
    }

    public function year($year = NULL)
    {
        if ($year === NULL) {
            return $this->year;
        } else {
            return $this->year = $year;
        }
    }
}
