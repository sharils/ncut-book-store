<?php
class Database
{ 
	static $db;
	static function initialise($host, $user, $pwd, $database)
	{
		$dsn = 'mysql:dbname=' . $database . ';host=' . $host;
		self::$db = new PDO($dsn, $user, $pwd);
	}

	static function execute($sql, $exe=array())
	{	
		$result = self::$db->prepare($sql);
		$result->execute($exe);
		return $result->fetchall();
	}
}

//測試
Database::initialise('localhost', 'root', '123456', 'test');
$users = Database::execute('SELECT * FROM `user` ');
print_r($users);