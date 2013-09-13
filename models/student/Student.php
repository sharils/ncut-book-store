<?php
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
            `class`,
            `department`,
            `name`,
            `type`,
            `phone`,
            `year`
        ) VALUE (
            :id,
            :sn,
            :email,
            :class,
            :department,
            :name,
            :type,
            :phone,
            :year
        )";
    private static $UPDATE = "UPDATE `student` SET
            `sn` = :sn,
            `email` = :email,
            `class` = :class,
            `department` = :department,
            `name` = :name,
            `type` = :type,
            `phone` = :phone,
            `year` = :year
        WHERE `user_id` = :id";

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
            self::$INSERTION,
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

        return new self(
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
                $row['class'],
                $row['department'],
                $row['name'],
                $row['type'],
                $row['phone'],
                $row['year']
            );
        }
        return $students;
    }

    private function __construct($id, $sn, $email, $class, $department, $name, $type, $phone, $year)
    {
        $this->class = $class;
        $this->department = $department;
        $this->email = $email;
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->sn = $sn;
        $this->type = $type;
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

    public function type($class = NULL)
    {
        if ($class === NULL) {
            return $this->class;
        } else {
            return $this->class = $class;
        }
    }

    public function update()
    {
        Database::execute(
            self::$UPDATE,
            array (
                ':sn' =>  $this->sn,
                ':email' =>  $this->email,
                ':class' =>  $this->class,
                ':department' =>  $this->department,
                ':name' =>  $this->name,
                ':type' =>  $this->type,
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
