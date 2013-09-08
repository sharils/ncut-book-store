<?php
class Student
{
    private static $DELETION ="DELETE FROM `student` WHERE `user_id` = :id";
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
    private static $UPDATE = "UPDATE `student`
        SET `email` = :email
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

    public function department()
    {
        return $this->department;
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

    public function name()
    {
        return $this->name;
    }

    public function phone()
    {
        return $this->phone;
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
            self::$UPDATE,
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