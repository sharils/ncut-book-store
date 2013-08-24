User Module
===========

User authenticate(String sn, String sn, String password)
--------------------------------------------------------

	$user = User::authenticate($sn, $type, $password);

This method uses $sn and $type to find $user\_id, and check if $user\_id and
$password forms a pair it returns an instance of User. Otherwise it throws an
exception. What's thrown is yet to be defined.

User create(String password)
----------------------------
This static method should insert data into the user table and return a user
object representing the record. This method depends on the Password module.

User from(Int user\_id)
-----------------------
This static method should return an user object representing the record with
the user id in the user table.

delete()
--------
This instance method deletes the record with the stored user id from the
database.

Int id()
--------
This instance method returns the id of this user.

RoleClass toRole()
------------------
This instance method returns a RoleClass object representing the user.
