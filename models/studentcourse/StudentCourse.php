<?php
require_once 'models/course/Course.php';
class StudentCourse
{
    private static $DELETION = "DELETE FROM `student_course`
        WHERE `student_user_id` = :student_id
        AND `course_id` = :course_id";

    private static $INSERTION = "INSERT INTO `student_course` (
            `student_user_id`,
            `course_id`
        ) VALUE (
            :student_id,
            :course_id
        )";
    private static $FIND_SELECTION = "SELECT `course_id` FROM `student_course`
        WHERE `student_user_id` = :student_id";

    private $student;
    private $course;

    public static function from(Student $student)
    {
        $result = Database::execute(
            self::$FIND_SELECTION,
            array(
                ':student_id' =>  $student->id()
            )
        );

        $StudentCourses = array();
        if(empty($result)) {
            $StudentCourse[] = new self(Null, $student);
        } else {
            foreach ($result as $row) {
                $StudentCourse[] = new self(
                    Course::from($row['course_id']),
                    $student
                );
            }
        }
        return $StudentCourse;
    }

    public function add(Course $course)
    {
        Database::execute(
            self::$INSERTION,
            array(
                ':student_id' => $this->student->id(),
                ':course_id' => $course->id()
            )
        );
    }

    private function __construct($course, $student)
    {
        $this->course = $course;
        $this->student = $student;
    }

    public function course()
    {
        return $this->course;
    }

    public function remove(Course $course)
    {
        Database::execute(
            self::$DELETION,
            array(
                ':student_id' => $this->student->id(),
                ':course_id' => $course->id()
            )
        );
    }
}
