<?php
require_once 'Password.php';

class User
{
	public static function authenticate($sn, $type, $password)
	{
		$result = Database::execute(
			" SELECT `user`.id, pwd, salt FROM `user` INNER JOIN `$type` ON `user`.id = `$type`.user_id 
				WHERE `$type`.sn = :sn ",
			array(
				':sn' => $sn,
			)
		);

		if (empty($result)) {
			throw new Exception('No result');
		}

		//$password = Password::form($result[0]['pwd'],$result[O]['salt']);
		$password = $result[0]['pwd'];
		return Password::verify($password);
	}
}