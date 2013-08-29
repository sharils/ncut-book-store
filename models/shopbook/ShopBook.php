<?php
require_once '../../models/book/Book.php';
class ShopBook
{
	private static $DELETION = "DELETE FROM `shop_book` WHERE `book_id` = :id";
	private static $INSERTION = "INSERT INTO `shop_book`(
			`book_id`,
			`num`,
			`shelf`
		) VALUE (
			:id,
			:num,
			:shelf
		)";
	private static $FIND_SELECTION = "SELECT * FROM `shop_book`";
	private static $FROM_SELECTION = "SELECT * FROM `shop_book` WHERE `book_id` = :id";
	private static $UPDATE= "UPDATE `shop_book` SET `num` = :num, `shelf` = :shelf WHERE `book_id` = :id";

	private $book;
	private $number;
	private $shelf;

	public static function create(Book $book, $number, $shelf)
	{
		Database::execute(
			self::$INSERTION,
			array(
				':id' => $book->id(),
				':num' => $number,
				':shelf' => $shelf
			)
		);
		return new self ($book, $number, $shelf);
	}

	public static function find()
	{
		$selected = Database::execute(
			self::$FIND_SELECTION
		);
		return self::refine($selected);
	}

	public static function from(Book $book)
	{
		$selected = Database::execute(
			self::$FROM_SELECTION,
			array(
				':id' => $book->id()
			)
		);
		$shop_books = self::refine($selected);
		return $shop_books[0];
	}

	private static function refine($selected)
	{
		$shop_books = array();
		foreach ($selected as $row) {
			$shop_books[] = new self(
				Book::from($row['book_id']),
				$row['num'],
				$row['shelf']
			);
		}
		return $shop_books;
	}

	public function book()
	{
		return $this->book;
	}

	private function __construct(Book $book, $number, $shelf)
	{
		$this->book = $book;
		$this->number = $number;
		$this->shelf = $shelf;
	}

	public function delete()
	{
		Database::execute(
			self::$DELETION,
			array(
				':id' => $this->book()->id()
			)
		);
	}

	public function number($number = NULL)
	{
		if ($number === NULL) {
			return $this->number;
		} else {
			return $this->number = $number;
		}
	}

	public function shelf($needed = NULL)
	{
		if ($needed === NULL) {
			return $this->shelf == false ? false : true;
		} else {
			return $this->shelf = $needed;
		}
	}

	public function update()
	{
		Database::execute(
			self::$UPDATE,
			array(
				':num' => $this->number,
				':shelf' => $this->shelf == false ? '' : '1',
				':id' => $this->book()->id()
			)
		);
	}
}