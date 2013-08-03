Student Module
==============

Student create(User user, String email, ..., etc)
-------------------------------------------------
This static method inserts a record into the student table and returns an
student object representing the recod.

Student from(User user)
-----------------------
This static method returns an student object representing the record in the
student table with the user id stored.

delete()
--------
This instance method deletes the record in the student table with the user id
stored.

String email()
--------------
This instance method returns the email property.

email(String email)
-------------------
This instance method sets the email property.

update()
--------
This instance method updates the record in the student table with the user id
stored. Properties are synchronised to the database.
