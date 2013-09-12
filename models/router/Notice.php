<?php
class Notice
{
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
    }
}
