<?php
class Clerk
{
    private static $DELETION="DELETE FROM `clerk` WHERE `user_id` = :id";
    private static $FIND_SELECTION="SELECT * FROM `clerk`";
    private static $INSERTION ="INSERT INTO `clerk` (
            `user_id`,
            `sn`,
            `email`,
            `name`,
            `phone`,
            `phone_ext`
        ) VALUE (
            :id,
            :sn,
            :email,
            :name,
            :phone,
            :phone_ext
        )";
    private static $FROM_SELECTION="SELECT * FROM `clerk`
        WHERE `user_id` = :id";
    private static $UPDATE="UPDATE `clerk` SET
            `sn` = :sn,
            `email` = :email,
            `name` = :name,
            `phone` = :phone,
            `phone_ext` = :phone_ext
        WHERE `user_id` = :id";

    private $email;
    private $id;
    private $name;
    private $phone;
    private $phone_ext;
    private $sn;

    public static function create($user, $sn, $email, $name, $phone, $phone_ext)
    {
        Database::execute(
            self::$INSERTION,
            array(
                ':id' => $user->id(),
                ':sn' => $sn,
                ':email' => $email,
                ':name' => $name,
                ':phone' => $phone,
                ':phone_ext' => $phone_ext
            )
        );
        return new self($user->id(), $sn, $email, $name, $phone, $phone_ext);
    }

    public static function find()
    {
        $selected = Database::execute(self::$FIND_SELECTION);
        return self::refine($selected);
    }

    public static function from($user)
    {
        $selected = Database::execute(
            self::$FROM_SELECTION,
            array(
                ':id' => $user->id()
            )
        );
        $users = self::refine($selected);
        return $users[0];
    }

    private static function refine($selected)
    {
        $clerks = array();
        foreach ($selected as $row) {
            $clerks[] = new self(
                $row['user_id'],
                $row['sn'],
                $row['email'],
                $row['name'],
                $row['phone'],
                $row['phone_ext']
            );
        }
        return $clerks;
    }

    private function __construct($id, $sn, $email, $name, $phone, $phone_ext)
    {
        $this->email = $email;
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->phone_ext = $phone_ext;
        $this->sn = $sn;
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

    public function name($name = NULL)
    {
        if ($name === NULL) {
            return $this->name;
        } else {
            return $this->name = $name;
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

    public function sn($sn = NULL)
    {
        if ($sn === NULL) {
            return $this->sn;
        } else {
            return $this->sn = $sn;
        }
    }

    public function update()
    {
        Database::execute(
            self::$UPDATE,
            array(
                ':sn' => $this->sn,
                ':email' => $this->email,
                ':name' => $this->name,
                ':phone' => $this->phone,
                ':phone_ext' => $this->phone_ext,
                ':id' => $this->id
            )
        );
    }
}
