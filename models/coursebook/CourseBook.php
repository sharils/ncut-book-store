<?php
require_once 'models/book/Book.php';
require_once 'models/course/Course.php';
Class CourseBook
{
    private static $DELETION = "DELETE FROM `course_book`
        WHERE `book_id` = :book_id
        AND `course_id` = :course_id ";
    private static $FIND_BOOK_SELECTION = "SELECT * FROM `course_book`
        WHERE `book_id` = :book_id";
    private static $FIND_COURSE_SELECTION = "SELECT * FROM `course_book`
        WHERE `course_id` = :course_id";
    private static $FIND_ALL_SELECTION = "SELECT * FROM `course_book`";
    private static $FROM_SELECTION = "SELECT * FROM `course_book`
        WHERE `course_id` = :course_id
        AND `book_id` = :book_id";

    private static $INSERTION = "INSERT INTO `course_book` (
            `course_id`,
            `book_id`,
            `sample`
        ) VALUE (
            :course_id,
            :book_id,
            :sample
        )";

    private static $UPDATE = "UPDATE `course_book`
        SET `sample` = :sample WHERE `book_id` = :book_id";

    private $book;
    private $course;
    private $sample;

    public static function create(Course $course, Book $book, $sample)
    {
        Database::execute(
            self::$INSERTION,
            array(
                ':course_id' => $course->id(),
                ':book_id' => $book->id(),
                ':sample' => $sample
            )
        );
        return new self($book, $course, $sample);
    }

    public static function findBook($book)
    {
        $result = Database::execute(
            self::$FIND_BOOK_SELECTION,
            array(
                ':book_id' => $book->id()
            )
        );
        return self::refine($result);
    }

    public static function findCourse($course)
    {
        $result = Database::execute(
            self::$FIND_COURSE_SELECTION,
            array(
                ':course_id' => $course->id()
            )
        );
        return self::refine($result);
    }

    public static function findAll()
    {
        $result = Database::execute(
            self::$FIND_ALL_SELECTION
        );
        return self::refine($result);
    }

    public static function from(Course $course, Book $book)
    {
        $result = Database::execute(
            self::$FROM_SELECTION,
            array(
                ':course_id' => $course->id(),
                ':book_id' => $book->id()
            )
        );
        $course_books = self::refine($result);
        return $course_books[0];
    }

    private static function refine($result)
    {
        $course_books = array();
        foreach ($result as $row) {
            $book = Book::from($row['book_id']);
            $course = Course::from($row['course_id']);
            $course_books[] = new self(
                $book,
                $course,
                $row['sample']
            );
        }
        return $course_books;
    }

    public function book()
    {
        return $this->book;
    }

    private function __construct($book, Course $course, $sample)
    {
        $this->book = $book;
        $this->course = $course;
        $this->sample = $sample;
    }

    public function course()
    {
        return $this->course;
    }

    public function delete()
    {
        Database::execute(
            self::$DELETION,
            array(
                ':book_id' => $this->book->id(),
                ':course_id' => $this->course->id()
            )
        );
    }

    public function sample($needed = NULL)
    {
        if ($needed === NULL) {
            return ($this->sample === '') ? false : true;
        } else {
            return $this->sample = $needed;
        }
    }

    public function update()
    {
        Database::execute(
            self::$UPDATE,
            array(
                ':sample' => $this->sample == false ? '' : '1',
                ':book_id' => $this->book->id()
            )
        );
    }
}
