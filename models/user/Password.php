<?php
class Password
{
    private $hashed;
    private $salt;

    public static function create($pwd)
    {
        $salt = substr(md5(mt_rand()), 0, 20);
        $hashed = crypt($pwd, $salt);
        $password = self::from($hashed, $salt);
        return $password;
    }
    public static function from($hashed, $salt)
    {
        $password = new self();
        $password->hashed = $hashed;
        $password->salt = $salt;
        return $password;
    }
    public function password()
    {
        return $this->hashed;
    }
    public function salt()
    {
        return $this->salt;
    }
    public function verify($password)
    {
        $old_password = $this->password();
        $salt = $this->salt();
        $new_password = crypt($password, $salt);
        If ($old_password === $new_password) {
            return true;
        } else {
            return false;
        }
    }
}

