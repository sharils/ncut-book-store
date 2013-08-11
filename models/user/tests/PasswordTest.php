<?php

class PasswordTest extends PHPUnit_Framework_TestCase
{
    public function testVerifyCreated()
    {
        $raw_password = 'hello';
        $password = Password::create($raw_password);
        $actual = $password->verify($raw_password);
        $expected = true;

        $this->assertEquals($expected, $actual);
    }

    public function testVerifyFrom()
    {
        $salt = 'a3c909375520866043b3';
        $hashed_password = 'a3.hpsH6uqLD6';
        $password = Password::from($hashed_password, $salt);

        $actual = $password->verify('hello');
        $expected = true;

        $this->assertEquals($expected, $actual);

        $actual = $password->verify('apple');

        $this->assertFalse($actual);
    }
}