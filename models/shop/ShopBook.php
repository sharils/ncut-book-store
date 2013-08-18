<?php
class ShopBook
{

    const _INSERTION = " INSERT INTO `shop_book`(
            `book_id`,
            `num`
        ) value (
            :id,
            :num
        ) ";
    const _SELECTION = " SELECT * FROM `shop_book` WHERE `book_id` = :id ";
    const _UPDATE = " UPDATE shop_book SET num = :num WHERE `book_id` = :id ";
    private $book_id;
    private $number;


    public static function create($book, $number)
    {
        $book_id = $book->id();
        $result = Database::execute(
            self::_INSERTION,
            array(
                ':id' => $book_id,
                ':num' => $number
            )
        );
    }
    public static function from($book)
    {
        $raw_book = Database::execute(
            self::_SELECTION,
            array(
                ':id' => $book->id();
            )
        );
        $ShopBook = self::refine($raw_book);
        return $ShopBook[0];
    }
    private static function refine(array $raw_book)
    {
        $ShopBook = array();

        foreach ($raw_book as $raw_book) {

            $ShopBook[] = new self(
                $raw_book['id'],
                $raw_book['num']
            );
        }
        return $ShopBook;
    }

    public function availability($availability = null)
    {
        if ($availability === null) {
            return $this->availability;
        }else {
            $this->availability = $availability;
        }
    }
    public function number($number = null)
    {
        if ($number === null) {
            return $this->number;
        }else {
            $this->number = $number;
        }
    }
    public function update()
    {
        Database::execute(
            self::_UPDATE,
            array(
                ':num' => $this->number,
                ':id' => $this->book_id
            )
        );
    }
}
