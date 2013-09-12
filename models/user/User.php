<?php
require_once 'models/admin/Admin.php';
require_once 'models/clerk/Clerk.php';
require_once 'models/user/Password.php';
require_once 'models/student/Student.php';
require_once 'models/teacher/Teacher.php';
class User
{
    private static $CHANGEPWD_SELECTION = "SELECT `user`.pwd, salt
        FROM `user`
        WHERE `id` = :id";
    private static $DELETION = "DELETE FROM `user` WHERE `id` = :id";
    private static $FIND_SELECTION = "SELECT * FROM `user` WHERE `id` = :id";
    private static $INSERTION = "INSERT INTO `user` (
            `id`,
            `pwd`,
            `salt`
        ) VALUE (
            :id,
            :pwd,
            :salt
        )";
    private static $UPDATE = "UPDATE `user`
        SET `pwd` = :pwd, `salt` = :salt
        WHERE `id` = :id";

    private $id;
    private $role;

    public static function authenticate($sn, $type, $password)
    {
        $result = Database::execute(
            "SELECT `user`.id, pwd, salt
            FROM `user` INNER JOIN `$type` ON `user`.id = `$type`.user_id
            WHERE `$type`.sn = :sn",
            array(
                ':sn' => $sn
            )
        );

        if (empty($result)) {
            throw new Exception('登入失敗：這個帳號不存在！');
        }
        $user = new self();
        $user->id = $result[0]['id'];
        $pwd = Password::from($result[0]['pwd'], $result[0]['salt']);

        if ($pwd->verify($password) === FALSE) {
            throw new Exception('登入失敗：密碼有誤！');
        };
        return $user;
    }

    public static function create($password)
    {
        $pwd = Password::create($password);
        $user = new self();
        $id = time();
        $user->id = $id;

        Database::execute(
            self::$INSERTION,
            array(
                ':id' => $id,
                ':pwd' => $pwd->password(),
                ':salt' => $pwd->salt()
            )
        );
        return $user;
    }

    public static function find($id_or_sn)
    {
        $user = new self();
        $data = $user->getRole($id_or_sn);
        $user->id = $data['id'];
        $user->role = $data['role'];
        return $user;
    }

    public static function from($id)
    {
        $user = new self();
        $row = Database::execute(
            self::$FIND_SELECTION,
            array(
                ':id' => $id
            )
        );
        $user->id = $row[0]['id'];
        return $user;
    }

    public function changePassword($password, $new_password)
    {
        $result = Database::execute(
            self::$CHANGEPWD_SELECTION,
            array(':id' => $this->id())
        );
        $pwd = Password::from($result[0]['pwd'], $result[0]['salt']);

        if ($pwd->verify($password) === FALSE) {
            throw new Exception('修改失敗：輸入的舊密碼有誤');
        };

        $new_pwd = Password::create($new_password);
        Database::execute(
            self::$UPDATE,
            array(
                ':pwd' => $new_pwd->password(),
                ':id' => $this->id,
                ':salt' => $new_pwd->salt()
            )
        );
    }

    public function delete()
    {
        Database::execute(
            self::$DELETION,
            array(':id' => $this->id)
        );
    }

    public function getRole($id_or_sn)
    {
        $table = array('teacher', 'student', 'admin', 'clerk');
        foreach ($table as $type) {
            $result = Database::execute(
                "SELECT `user`.id FROM `user`
                INNER JOIN `$type` ON `user`.id = `$type`.user_id
                WHERE `$type`.sn = :sn OR `$type`.user_id = :user_id ",
                array(
                    ':sn' => $id_or_sn,
                    ':user_id' => $id_or_sn
                )
            );
            if (!empty($result)){
                return array(
                    'role' => $type,
                    'id' => $result[0]['id']
                );
            }
        }
    }

    public function id()
    {
        return $this->id;
    }

    public function role()
    {
        $role = $this->role;
        if ($role === null) {
            $data = $this->getRole($this->id);
            $role = $this->role = $data['role'];
        }
        return $role;
    }

    public function toRole()
    {
        $role = $this->role();
        $role = ucfirst($role);
        return $role::from($this);
    }
}
