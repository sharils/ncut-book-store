Password Module
===============
We need a password module to deal with the password and salt.

This Password class has these public instance methods:

	$password->salt();

This returns the salt stored in this object.

	$password->password();

This returns the hashed password stored in this object.

	$password->verify($password);

This tells us whether the $password is the plain password.

	$password->update($old_password, $new_password);

This changes the hashed password and the salt stored in this object based on

	$new_password. If $password->verify($old_password) is true.

This password class also has these static methods:

	Password::create($password);

This returns an instance of the Password class, with randomly generated salt
and hashed password stored in it.

	Password::from($password, $salt);

This returns an instance of the Password class, with the hashed password being
$password and salt being $salt.
