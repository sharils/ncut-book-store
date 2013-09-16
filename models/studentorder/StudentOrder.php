<?php
require_once 'models/clerk/Clerk.php';
require_once 'models/student/Student.php';
require_once 'models/user/User.php';
class StudentOrder
{
    private static $FIND_SELECTION = "SELECT * FROM `student_order`
        WHERE `student_user_id` = :student_id";
    private static $FINDCART_SELECTION ="SELECT * FROM `student_order`
        WHERE `student_user_id` = :student_id
        AND `status` = :status";
    private static $FROM_SELECTION = "SELECT * FROM `student_order`
        WHERE `id` = :id";
    private static $INSERTION = "INSERT INTO `student_order` (
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

    public static function create(Student $student)
    {
        $id = time();
        $date = date("Y-m-d H:i:s");
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

    public static function findCart(Student $student)
    {
        $result = Database::execute(
            self::$FINDCART_SELECTION,
            array(
                ':student_id' => $student->id(),
                ':status' => 'shopping'
            )
        );

        if (empty($result)) {
            return NULL;
        }

        $StudentOrders = self::refine($result);
        return $StudentOrders[0];
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

            $suser = Student::from(USER::from($row['student_user_id']));
            $cuser = NULL ;

            if (!empty($row['clerk_user_id'])) {
                $cuser = Clerk::from(USER::from($row['clerk_user_id']));
            }

            $StudentOrders[] = new self(
                $cuser,
                $row['date'],
                $row['id'],
                $row['status'],
                $suser);
        }
        return $StudentOrders;
    }

    public function clerk(Clerk $clerk = NULL)
    {
        if ($clerk === NULL) {
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
        if ($date === NULL ) {
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
        if ($status === NULL) {
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
