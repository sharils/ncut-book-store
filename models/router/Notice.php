<?php
class Notice
{
    private static $msg = [
        '密碼驗證有誤',
        '帳號 OR 密碼有誤',
        '存入失敗'
    ];

    private static $notice;

    public static function addTo($notice, $url)
    {
        return $url = $url . '?notice=' . $notice;
    }

    public static function get()
    {
        return self::$notice;
    }

    public static function set($notice)
    {
        self::$notice = $notice();
        // self::$notice = self::$msg[$notice];
    }
}
