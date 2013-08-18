User Module
===========

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
