<?php
class Publisher
{
    private static $DELETION = "DELETE FROM `publisher` WHERE `id` = :id";
    private static $INSERTION = "INSERT INTO `publisher` (
            `id`,
            `email`,
            `account`,
            `address`,
            `name`,
            `person`,
            `phone`,
            `phone_ext`
        ) VALUE (
            :id,
            :email,
            :account,
            :address,
            :name,
            :person,
            :phone,
            :phone_ext
        )";
    private static $FIND_SELECTION = "SELECT * FROM `publisher`";
    private static $FROM_SELECTION = "SELECT * FROM `publisher` WHERE `id` = :id";
    private static $UPDATE= "UPDATE `publisher`
        SET `email` = :email,
        `address` = :address,
        `person` = :person,
        `phone` = :phone,
        `phone_ext` = :phone_ext
        WHERE `id` = :id";

    private $account;
    private $address;
    private $email;
    private $id;
    private $name;
    private $person;
    private $phone;
    private $phone_ext;

    public static function create($email, $account, $address, $name, $person, $phone, $phone_ext)
    {
        $id = time();
        Database::execute(
            self::$INSERTION,
            array(
                ':id' => $id,
                ':email' => $email,
                ':account' => $account,
                ':address' => $address,
                ':name' => $name,
                ':person' => $person,
                ':phone' => $phone,
                ':phone_ext' => $phone_ext
            )
        );
        return new self(
            $id,
            $email,
            $account,
            $address,
            $name,
            $person,
            $phone,
            $phone_ext
        );
    }

    public static function find()
    {
        $selected = Database::execute(
            self::$FIND_SELECTION
        );
        return self::refine($selected);
    }

    public static function from($id)
    {
        $selected = Database::execute(
            self::$FROM_SELECTION,
            array(
                ':id' => $id
            )
        );
        $publishers = self::refine($selected);
        return $publishers[0];
    }

    private static function refine($selected)
    {
        $publishers = array();
        foreach ($selected as $row) {
            $publishers[] = new self(
                $row['id'],
                $row['email'],
                $row['account'],
                $row['address'],
                $row['name'],
                $row['person'],
                $row['phone'],
                $row['phone_ext']
            );
        }
        return $publishers;
    }

    public function account()
    {
        return $this->account;
    }

    public function address($address = NULL)
    {
        if ($address === NULL) {
            return $this->address;
        } else {
            return $this->address = $address;
        }
    }

    private function __construct($id, $email, $account, $address, $name, $person, $phone, $phone_ext)
    {
        $this->account = $account;
        $this->address = $address;
        $this->email = $email;
        $this->id = $id;
        $this->name = $name;
        $this->person = $person;
        $this->phone = $phone;
        $this->phone_ext = $phone_ext;
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

    public function person($person = NULL)
    {
        if ($person === NULL) {
            return $this->person;
        } else {
            return $this->person = $person;
        }
    }

    public function phone($phone = NULL)
    {
        if ($phone === NULL) {
            return $this->phone;
        } else {
            return $this->phone = $phone;
        }
    }

    public function phone_ext($phone_ext = NULL)
    {
        if ($phone_ext === NULL) {
            return $this->phone_ext;
        } else {
            return $this->phone_ext = $phone_ext;
        }
    }

    public function update()
    {
        Database::execute(
            self::$UPDATE,
            array(
                ':email' => $this->email,
                ':address' => $this->address,
                ':person' => $this->person,
                ':phone' => $this->phone,
                ':phone_ext' => $this->phone_ext,
                ':id' => $this->id
            )
        );
    }
}
