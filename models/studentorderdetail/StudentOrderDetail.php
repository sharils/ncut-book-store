<?php
require_once 'models/book/Book.php';
require_once 'models/studentorder/StudentOrder.php';
class StudentOrderDetail
{
    private static $DELETION ="DELETE FROM `student_order_detail`
        WHERE `id` = :id";
    private static $FIND_SELECTION = "SELECT * FROM `student_order_detail`
        WHERE `student_order_id` = :student_order_id";
    private static $FROM_SELECTION = "SELECT * FROM `student_order_detail`
        WHERE `id` = :id";
    private static $INSERTION = "INSERT INTO `student_order_detail` (
            `student_order_id`,
            `id`,
            `book_id`,
            `num`,
            `remark`
        ) VALUE (
            :student_order_id,
            :id,
            :book_id,
            :num,
            :remark
        )";
    private static $UPDATE = "UPDATE `student_order_detail`
        SET `num` = :num,
        `remark` = :remark
        WHERE `id` = :id";

    private $book;
    private $id;
    private $number;
    private $remark;
    private $student_order;

    public static function create(StudentOrder $student_order, Book $book, $number = 0 ,$remark = '')
    {
        $id = Database::getRandomId();
        Database::execute(
            self::$INSERTION,
            array(
                ':student_order_id' => $student_order->id(),
                ':id' => $id,
                ':book_id' => $book->id(),
                ':num' => $number,
                ':remark' => $remark
            )
        );
        return new self($student_order, $id, $book, $number, $remark);
    }

    public static function find(StudentOrder $student_order)
    {
        $result = Database::execute(
            self::$FIND_SELECTION,
            array(
                ':student_order_id' => $student_order->id()
            )
        );
        return self::refine($result);
    }

    public static function from($id)
    {
        $result = Database::execute(
            self::$FROM_SELECTION,
            array(
                ':id' => $id
            )
        );
        $student_order_details = self::refine($result);
        return $student_order_details[0];
    }

    private static function refine($result)
    {
        $student_order_details = array();

        foreach ($result as  $row) {
            $book = Book::from($row['book_id']);
            $student_order = StudentOrder::from($row['student_order_id']);

            $student_order_details[] = new self(
                $student_order,
                $row['id'],
                $book,
                $row['num'],
                $row['remark']
            );
        }
        return $student_order_details;
    }

    private function __construct($student_order, $id, $book, $number, $remark)
    {
        $this->book = $book;
        $this->id = $id;
        $this->number = $number;
        $this->remark = $remark;
        $this->student_order = $student_order;
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
    public function book()
    {
        return $this->book;
    }

    public function id()
    {
        return $this->id;
    }

    public function number($number=NULL)
    {
        if ($number === NULL) {
            return $this->number;
        } else {
            return $this->number = $number;
        }
    }
    public function remark($remark=NULL)
    {
        if ($remark === NULL) {
            return $this->remark;
        } else {
            return $this->remark = $remark;
        }
    }
    public function student_order()
    {
        return $this->student_order;
    }

    public function update()
    {
        Database::execute(
            self::$UPDATE,
            [
                ':num' => $this->number,
                ':remark' => $this->remark,
                ':id' => $this->id

            ]
        );
    }
}
