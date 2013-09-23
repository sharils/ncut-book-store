<?php
class Create
{
    public static $active= [
            'clerk' => '',
            'student' => '',
            'teacher' => '',
        ];
    public static $args;
    public static $role;
    public static $title;
    public static function admin()
    {
        self::$title = ['管理者', 'Admin'];
        self::$args = [
            'sn'                => ['帳號', 'text', NULL],
            'pwd'               => ['密碼', 'password', NULL],
            'confirmpassword'   => ['確認密碼', 'password', NULL],
            'name'              => ['姓名', 'text', NULL],
            'email'             => ['信箱', 'text', NULL],
            'phone'             => ['電話', 'text', NULL],
            'phone_ext'         => ['分機號碼', 'text', NULL]
       ];
    }

    public static function clerk()
    {
        self::$title = ['個人資料', 'Clerk'];
        self::$args = [
            'sn'                => ['帳號', 'text', NULL],
            'pwd'               => ['密碼', 'password', NULL],
            'confirmpassword'   => ['確認密碼', 'password', NULL],
            'name'              => ['姓名', 'text', NULL],
            'email'             => ['信箱', 'text', NULL],
            'phone'             => ['電話', 'text', NULL],
            'phone_ext'         => ['分機號碼', 'text', NULL]
       ];
    }

    public static function publisher()
    {
        self::$title = ['出版社', 'Publisher'];
        self::$args = [
            'name'      => ['出版社名稱', 'text', NULL],
            'address'   => ['地址', 'text', NULL],
            'person'    => ['負責人', 'text', NULL],
            'phone'     => ['連絡電話', 'text', NULL],
            'email'     => ['信箱', 'text', NULL],
            'fax' => ['傳真號碼', 'text', NULL],
            'account'   => ['匯款帳戶', 'text', NULL]
       ];
    }

    public static function student()
    {
        self::$title = ['個人資料', 'Student'];
        self::$args = [
            'sn'                => ['帳號', 'text', NULL],
            'pwd'               => ['密碼', 'password', NULL],
            'confirmpassword'   => ['確認密碼', 'password', NULL],
            'name'              => ['姓名', 'text', NULL],
            'email'             => ['信箱', 'text', NULL],
            'phone'             => ['電話', 'text', NULL],
            'group'             => ['班級', 'text', NULL],
            'department'        => ['科系', 'text', NULL],
            'system'              => ['學制', 'text', NULL],
            'year'              => ['入學年', 'text', NULL]
       ];
    }

    public static function teacher()
    {
        self::$title = ['個人資料', 'Teacher'];
        self::$args = [
            'sn'                => ['帳號', 'text', NULL],
            'pwd'               => ['密碼', 'password', NULL],
            'confirmpassword'   => ['確認密碼', 'password', NULL],
            'name'              => ['姓名', 'text', NULL],
            'email'             => ['信箱', 'text', NULL],
            'phone'             => ['電話', 'text', NULL],
            'phone_ext'         => ['分機號碼', 'text', NULL]
       ];
    }
}
