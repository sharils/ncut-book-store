<?php
class Database
{
    private static $db;
    public static function initialise($host, $user, $pwd, $database)
    {
        $dsn = 'mysql:dbname=' . $database . ';host=' . $host;
        self::$db = new PDO($dsn, $user, $pwd);
    }

    public static function execute($sql, $exe=array())
    {
        $result = self::$db->prepare($sql);
        $result->execute($exe);
        return $result->fetchall();
    }

    public static function getRandomId()
    {
        return time() + rand(1,10000);
    }
}
