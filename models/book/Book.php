<?php
require_once 'models/publisher/Publisher.php';
class Book
{
    private static $DELETION = " DELETE FROM `book` WHERE `id` = :id ";
    private static $FACTOR;
    private static $FIND_SELECTION ="SELECT * FROM `book`";
    private static $ID_SELECTION = " SELECT * FROM `book` WHERE `id` = :id ";
    private static $INSERTION = " INSERT INTO `book` (
            `id`,
            `publisher_id`,
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
            :publisher_id,
            :author,
            :isbn,
            :market_price,
            :name,
            :price,
            :remark,
            :type,
            :version
        ) ";
    private static $ISBN_SELECTION ="SELECT * FROM `book` WHERE `isbn` LIKE :isbn";

    private static $UPDATE = " UPDATE `book`
        SET `publisher_id` = :publisher_id,
            `market_price` = :market_price,
            `price` = :price,
            `remark` = :remark
        WHERE `id` = :id ";

    private $author;
    private $id;
    private $isbn;
    private $market_price;
    private $name;
    private $price;
    private $publisher;
    private $remark;
    private $type;
    private $version;

    public static function create(Publisher $publisher, $author, $isbn, $market_price, $name, $price, $remark, $type, $version)
    {
        $id = time();
        Database::execute(
            self::$INSERTION,
            array(
                ':id' => $id,
                ':publisher_id' => $publisher->id(),
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
        return new self(
            $publisher,
            $author,
            $id,
            $isbn,
            $market_price,
            $name,
            $price,
            $remark,
            $type,
            $version
        );
    }

    public static function find($search_factor)
    {
        $where = self::getWhere($search_factor);
        $result = Database::execute(
            self::$FIND_SELECTION.$where,
            self::$FACTOR
        );
        if(empty($result)){
            return FALSE;
        }
        return self::refine($result);
    }

    public static function findIsbn($isbn)
    {
        $result = Database::execute(
            self::$ISBN_SELECTION,
            array(
                ':isbn' => $isbn,
            )
        );
        if(empty($result)){
            return FALSE;
        }
        $books = self::refine($result);
        return $books[0];
    }
    public static function from($id)
    {
        $result = Database::execute(
            self::$ID_SELECTION,
            array(
                ':id' => $id
            )
        );
        $books = self::refine($result);
        return $books[0];
    }

    private static function getWhere($search_factor)
    {
        $args = [];
        $where = "WHERE 1";
        foreach($search_factor as $key => $value) {
            $where.=" AND `$key` LIKE :$key";
            $args[":$key"] = "%$value%";
        }
        self::$FACTOR = $args;
        return $where;
    }

    private static function refine($rows)
    {
        $books = array();
        foreach ($rows as $row) {
            $books[] = new self(
                Publisher::from($row['publisher_id']),
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

    private function __construct($publisher, $author, $id, $isbn, $market_price, $name, $price, $remark, $type, $version)
    {
        $this->author = $author;
        $this->id = $id;
        $this->isbn = $isbn;
        $this->market_price = $market_price;
        $this->name = $name;
        $this->price = $price;
        $this->publisher = $publisher;
        $this->remark = $remark;
        $this->type = $type;
        $this->version = $version;
    }

    public function delete()
    {
        Database::execute(
            self::$DELETION,
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

    public function marketPrice($market_price =NULL)
    {
        if ($market_price === NULL) {
            return $this->market_price;
        } else {
            return $this->market_price = $market_price;
        }
    }

    public function name()
    {
        return $this->name;
    }

    public function price($price = NULL)
    {
        if ($price === NULL) {
            return $this->price;
        } else {
            return $this->price = $price;
        }
    }

    public function publisher($publisher = NULL)
    {
        if ($publisher === NULL) {
            return $this->publisher;
        } else {
            return $this->publisher = $publisher;
        }
    }

    public function remark($remark = NULL)
    {
        if ($remark === NULL) {
            return $this->remark;
        } else {
            return $this->remark = $remark;
        }
    }

    public function type()
    {
        return $this->type;
    }

    public function update()
    {
        Database::execute(
            self::$UPDATE,
            array(
                ':publisher_id' => $this->publisher()->id(),
                ':market_price' => $this->market_price,
                ':price' => $this->price,
                ':remark' => $this->remark,
                ':id' => $this->id()
            )
        );
    }

    public function version()
    {
        return $this->version;
    }
}
