<?php
class Password
{
    public static function from()
    {
        return new self();
    }

    public function verify($password)
    {
		return $password === '0000';
	}
}
