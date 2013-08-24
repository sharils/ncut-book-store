StudentOrderDetail Module
=========================

StudentOrderDetail create(StudentOrder student\_order)
------------------------------------------------------
This static method inserts a record into the student\_order\_detail table and
returns a StudentOrderDetail object representing the record.

StudentOrderDetails find(StudentOrder student\_order)
-----------------------------------------------------
This static method returns an array of StudentOrderDetail objects with the
student\_order\_id.

StudentOrderDetail from(Int student\_order\_detail\_id)
-------------------------------------------------------
This static method returns an admin object representing the record in the
student\_order\_detail table with the student\_order\_detail\_id stored.

Book book()
-----------
This instance method returns the book property of this object.

Int number()
------------
This instance method returns the number property of this object.

number(Int number)
------------------
This instance method sets the number property of this object.
