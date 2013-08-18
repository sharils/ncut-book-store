StudentOrder Module
===================

Student create(Student student, Timestamp date)
-----------------------------------------------
This static method inserts a record into the student\_order table and returns
a a StudentOrder object representing the record.

StudentOrders find(Student student)
-----------------------------------
This static method returns an array of StudentOrder objects belonging to the
student.

StudentOrder from(Int student\_order\_id)
-----------------------------------------
This static method returns an StudentOrder object representing the record in
the StudentOrder table with the id.

Clerk clerk()
-------------
This instance method returns the clerk property.

clerk(Clerk clerk)
------------------
This instance method sets the clerk property.

Timestamp date()
------
This instance method returns the date property.

date(Timestamp date)
--------------------
This instance method sets the date property.

Int id()
----
This instance method returns the id property.

String status()
--------
This instance method returns the status property.

status(status)
--------------
This instance method sets the status property.

Student student()
---------
This instance method returns the student property.

update()
--------
This instance method updates the record in the student\_order table with the
student order id stored. Properties are synchronised to the database.
