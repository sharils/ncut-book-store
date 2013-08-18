Admin Module
============

Admin create(User user, String email, ..., etc)
-----------------------------------------------
This static method inserts a record into the admin table and returns an admin
object representing the record.

Admin from(User user)
---------------------
This static method returns an admin object representing the record in the admin
table with the user id stored.

RoleClass createUser(String role, String email, ... etc)
--------------------------------------------------------
This instance method returns an object of the role.

delete()
--------
This instance method deletes the record in the admin table with the user id
stored.

String email()
--------------
This instance method returns the email property.

email(String email)
-------------------
This instance method sets the email property.

update()
--------
This instance method updates the record in the admin table with the user id
stored. Properties are synchronised to the database.
