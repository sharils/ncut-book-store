Clerk Module
============

Clerk create(User user, String email, ..., etc)
-----------------------------------------------
This static method inserts a record into the clerk table and returns an
clerk object representing the recod.

Clerk from(User user)
---------------------
This static method returns an clerk object representing the record in the
clerk table with the user id stored.

delete()
--------
This instance method deletes the record in the clerk table with the user id
stored.

String email()
--------------
This instance method returns the email property.

email(String email)
-------------------
This instance method sets the email property.

update()
--------
This instance method updates the record in the clerk table with the user id
stored. Properties are synchronised to the database.
