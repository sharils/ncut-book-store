<?php
Class CourseBook
{
	private static $DELETION = "DELETE FROM `course_book` WHERE `book_id` = :book_id";
	private static $FIND_SELECTION = "SELECT * FROM `course_book` WHERE  `course_id` = :course_id";
	private static $FROM_SELECTION = "SELECT * FROM `course_book`
		WHERE `course_id` = :course_id
		AND `book_id` = :book_id";

	private static $INSERTION = "INSERT INTO `course_book`(
			`course_id`,
			`book_id`,
			`sample`
		) VALUE (
			:course_id,
			:book_id,
			:sample
		)";

	private static $UPDATE = "UPDATE `course_book` SET `sample` = :sample WHERE book_id = :book_id";

	private $book;
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

		return new self($book, $sample);
	}

	public static function find($course)
	{
		$result = Database::execute(
			self::$FIND_SELECTION,
			array(
				':course_id' => $course->id()
			)
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
		$course_books =  self::refine($result);
		return $course_books[0];
	}

	public function book()
	{
		return $this->book;
	}

	private function __construct(Book $book, $sample)
	{
		$this->book = $book;
		$this->sample = $sample;
	}

	public function delete()
	{
		Database::execute(
			self::$DELETION,
			array(
				':book_id' => $this->book->id()
			)
		);
	}

	private function refine($rows)
	{
		$course_books = array();
		foreach ($rows as $row) {

			$book = Book::from($row['book_id']);

			$course_books[]= new self(
				$book,
				$row['sample']
			);
		}
		return $course_books;
	}

	public function sample($needed = NULL)
	{
		if ($needed === NULL) {
			return $this->sample == false ? '0' : $this->sample;
		} else {
			return $this->sample = $needed;
		}
	}

	public function update()
	{
		Database::execute(
			self::$UPDATE,
			array(
				':sample' => $this->sample(),
				':book_id' => $this->book->id()
			)
		);
	}
}