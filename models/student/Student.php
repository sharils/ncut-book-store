<?php
require_once 'models/course/Course.php';
class Student
{
    private static $DELETION ="DELETE FROM `student` WHERE `user_id` = :id";
    private static $FIND_SELECTION ="SELECT * FROM `student`";
    private static $FROM_SELECTION = "SELECT * FROM `student`
        WHERE `user_id` = :id";
    private static $INSERTION = "INSERT INTO `student` (
            `user_id`,
            `sn`,
            `email`,
            `department`,
            `group`,
            `name`,
            `system`,
            `phone`,
            `year`
        ) VALUE (
            :id,
            :sn,
            :email,
            :department,
            :group,
            :name,
            :system,
            :phone,
            :year
        )";
    private static $UPDATE = "UPDATE `student` SET
            `sn` = :sn,
            `email` = :email,
            `department` = :department,
            `group` = :group,
            `name` = :name,
            `system` = :system,
            `phone` = :phone,
            `year` = :year
        WHERE `user_id` = :id";

    private static $FIND_COURSE ="SELECT `course`.id FROM `course`
        INNER JOIN student ON `course`.`department` = `student`.`department` AND
        (`course`.`group` = `student`.`group` OR `course`.`group` = 'd') AND
        `student`.`system` = `course`.`system`
        AND date_format(now(),'%Y') - `student`.`year` = `course`.`grade` WHERE user_id = :id
        GROUP BY `course`.`id`";

    private $department;
    private $email;
    private $group;
    private $id;
    private $name;
    private $phone;
    private $sn;
    private $system;
    private $year;

    public static function create($user, $sn, $email, $group, $department, $name, $system, $phone, $year)
    {
        Database::execute(
            self::$INSERTION,
            array(
                ':id' => $user->id(),
                ':sn' => $sn,
                ':email' => $email,
                ':department' => $department,
                ':group' => $group,
                ':name' => $name,
                ':system' => $system,
                ':phone' => $phone,
                ':year' => $year
            )
        );

        return new self(
            $user->id(),
            $sn,
            $email,
            $department,
            $group,
            $name,
            $system,
            $phone,
            $year
        );
    }

    public static function find()
    {
        $selected = Database::execute(self::$FIND_SELECTION);
        return self::refine($selected);
    }

    public static function from($user)
    {
        $result = Database::execute(
            self::$FROM_SELECTION,
            array(
                ':id' => $user->id()
            )
        );
        $students = self::refine($result);
        return $students[0];

    }

    private static function refine($result)
    {
        $students = array();
        foreach ($result as $row) {
            $students[] = new self(
                $row['user_id'],
                $row['sn'],
                $row['email'],
                $row['department'],
                $row['group'],
                $row['name'],
                $row['system'],
                $row['phone'],
                $row['year']
            );
        }
        return $students;
    }

    private function __construct($id, $sn, $email, $department, $group, $name, $system, $phone, $year)
    {
        $this->department = $department;
        $this->email = $email;
        $this->group = $group;
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->sn = $sn;
        $this->system = $system;
        $this->year = $year;
    }

    public function delete()
    {
        Database::execute(
            self::$DELETION,
            array(
                ':id' => $this->id
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

    public function email($email = NULL)
    {
        if ($email === NULL) {
            return $this->email;
        } else {
            return $this->email = $email;
        }
    }

    public function getCourses()
    {
        $result = Database::execute(
            self::$FIND_COURSE,
            array (
                ':id' => $this->id
            )
        );
        $courses = [];
        foreach ($result as $row) {
            $courses[] = Course::from($row['id']);
        }
        return $courses;
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
        return $this->id;
    }

    public function name($name = NULL)
    {
       if ($name === NULL) {
            return $this->name;
        } else {
            return $this->name = $name;
        }
    }

    public function phone($phone = NULL)
    {
        if ($phone === NULL) {
            return $this->phone;
        } else {
            return $this->phone = $phone;
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

    public function update()
    {
        Database::execute(
            self::$UPDATE,
            array (
                ':sn' =>  $this->sn,
                ':email' =>  $this->email,
                ':department' =>  $this->department,
                ':group' =>  $this->group,
                ':name' =>  $this->name,
                ':system' =>  $this->system,
                ':phone' =>  $this->phone,
                ':year' =>  $this->year,
                ':id' => $this->id
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
