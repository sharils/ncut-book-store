<?php
class Admin
{
    private static $DELETION = "DELETE FROM `admin` WHERE `user_id` = :id";
    private static $FIND_SELECTION="SELECT * FROM `admin`";
    private static $FROM_SELECTION = "SELECT * FROM `admin`
        WHERE `user_id` = :id";
    private static $INSERTION = "INSERT INTO `admin` (
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
    private static $UPDATE="UPDATE `admin` SET
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
        $admin = new self($user->id(), $sn, $email, $name, $phone, $phone_ext);
        return $admin;
    }

    public static function find()
    {
        $selected = Database::execute(self::$FIND_SELECTION);
        return self::refine($selected);
    }

    public static function from($user)
    {
        $result = Database::execute(
            self::$FROM_SELECTION,
            array(
                ':id' => $user->id()
            )
        );

        $admins = self::refine($result);
        return $admins[0];
    }

    private static function refine($selected)
    {
        $admins = array();
        foreach ($selected as $row) {
            $admins[] = new self(
                $row['user_id'],
                $row['sn'],
                $row['email'],
                $row['name'],
                $row['phone'],
                $row['phone_ext']
            );
        }
        return $admins;
    }

    public function create_user()
    {
        $args = func_get_args();
        $user = User::create($args[1]);
        $input = array_splice($args, 0, 2, array($user));
        return call_user_func_array(array($input[0],'create'), $args);
    }

    public function __construct($id, $sn, $email, $name, $phone, $phone_ext)
    {
        $this->id = $id;
        $this->sn = $sn;
        $this->email = $email;
        $this->name = $name;
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
