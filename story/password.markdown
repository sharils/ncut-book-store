Password Module
===============
We need a password module to deal with the password and salt.

Password create(password)
-------------------------
This static method returns an instance of the Password class, with randomly
generated salt and hashed password stored in it.

Password from(password, salt)
-----------------------------
This static method returns an instance of the Password class, with the hashed
password being $password and salt being $salt.

String password()
-----------------
This instance method returns the hashed password stored in this object.

String salt()
-------------
This instance method returns the salt stored in this object.

update(String old\_password, String new\_password)
--------------------------------------------------
This instance method changes the hashed password and the salt stored in this
object based on $new\_password. If $password->verify($old\_password) is true.

Boolean verify(String password)
-------------------------------
This instance method tells us whether the $password is the plain password.
