Course Module
=============

Course create(Teacher teacher, String type, String name, String year)
---------------------------------------------------------------------
This static method inserts a record into the course table and returns a course
object representing the record.

Course from(Int course\_id)
---------------------------
This static method returns a course object representing the record in the
course table with the course id stored.

CourseBooks books()
------------------
This instance method returns an array of CourseBookList object, representing
the books associated with this course.

delete()
--------
This instance method deletes the record in the course table with the course id
stored.

Int id()
--------
This instance method returns the id property.

String name()
-------------
This instance method returns the name property.

Teacher teacher()
-----------------
This instance method returns the teacher property.

String type()
-------------
This instance method returns the type property.

Int year()
----------
This instance method returns the year property.
