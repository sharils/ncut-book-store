<?php
class Book
{
	const _DELETION = " DELETE FROM `book` WHERE `id` = :id ";
	const _ID_SELECTION = " SELECT * FROM `book` WHERE `id` = :id ";
	const _INSERTION = " INSERT INTO `book`(
			`id`,
			`author`,
			`isbn`,
			`market_price`,
			`name`,
			`price`,
			`remark`,
			`type`,
			`version`
		) VALUE (
			:id,
			:author,
			:isbn,
			:market_price,
			:name,
			:price,
			:remark,
			:type,
			:version
		) ";

	const _KEYWORD_SELECTION =" SELECT * FROM `book`
		WHERE `id` LIKE :KW
		OR `author` LIKE :KW
		OR `isbn` LIKE :KW
		OR `market_price` LIKE :KW
		OR `name` LIKE :KW
		OR `price` LIKE :KW
		OR `publisher_id` LIKE :KW
		OR `remark` LIKE :KW
		OR `type` LIKE :KW
		OR `version` LIKE :KW ";

	const _UPDATE = " UPDATE `book` SET `publisher_id` = :publisher_id WHERE id = :id ";

	private $author;
	private $id;
	private $isbn;
	private $market_price;
	private $name;
	private $price;
	private $remark;
	private $type;
	private $version;

	public static function create($author, $isbn, $market_price, $name, $price, $remark, $type, $version)
	{
		$id = time();
		Database::execute(
			self::_INSERTION,
			array(
				':id' => $id,
				':author' => $author,
				':isbn' => $isbn,
				':market_price' => $market_price,
				':name' => $name,
				':price' => $price,
				':remark' => $remark,
				':type' => $type,
				':version' => $version
			)
		);
		return new self($author, $id, $isbn, $market_price, $name, $price, $remark, $type, $version);
	}

	public static function find($keyword)
	{
		$result = Database::execute(
			self::_KEYWORD_SELECTION,
			array(
				':KW' => "%$keyword%",
				':KW' => "%$keyword%",
				':KW' => "%$keyword%",
				':KW' => "%$keyword%",
				':KW' => "%$keyword%",
				':KW' => "%$keyword%",
				':KW' => "%$keyword%",
				':KW' => "%$keyword%",
				':KW' => "%$keyword%",
				':KW' => "%$keyword%",
			)
		);
		return self::refine($result);
	}

	public static function from($id)
	{
		$result = Database::execute(
			self::_ID_SELECTION,
			array(
				':id' => $id
			)
		);
		$books = self::refine($result);
		return $books[0];
	}

	private static function refine($rows)
	{
		$books = array();
		foreach ($rows as $row) {
			$books[] = new self(
				$row['author'],
				$row['id'],
				$row['isbn'],
				$row['market_price'],
				$row['name'],
				$row['price'],
				$row['remark'],
				$row['type'],
				$row['version']
			);
		}
		return $books;
	}

	public function author()
	{
		return $this->author;
	}

	private function __construct($author, $id, $isbn, $market_price, $name, $price, $remark, $type, $version)
	{
		$this->author = $author;
		$this->id = $id;
		$this->isbn = $isbn;
		$this->market_price = $market_price;
		$this->name = $name;
		$this->price = $price;
		$this->remark = $remark;
		$this->type = $type;
		$this->version = $version;
	}

	public function delete()
	{
		Database::execute(
			self::_DELETION,
			array(
				':id' => $this->id()
			)
		);
	}

	public function id()
	{
		return $this->id;
	}

	public function isbn()
	{
		return $this->isbn;
	}

	public function marketPrice()
	{
		return $this->market_price;
	}

	public function name()
	{
		return $this->name;
	}

	public function price()
	{
		return $this->price;
	}

	public function remark()
	{
		return $this->remark;
	}

	public function type()
	{
		return $this->type;
	}

	public function update()
	{
		Database::execute(
			self::_UPDATE,
			array(
				':publisher_id' => $publisher_id,
				':id' => $this->id()
			)
		);
	}

	public function version()
	{
		return $this->version;
	}
}