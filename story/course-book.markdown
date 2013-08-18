CourseBook Module
=================

CourseBook create(Course course, Book book, Boolean sample)
-----------------------------------------------------------
This static method returns a CourseBook object and inserts a record into the
course\_book table.

CourseBooks find(Course)
------------------------
This static method returns an array of CourseBook objects that are used for a
course.

CourseBook from(Course course, Book book)
-----------------------------------------
This static method returns a CourseBook object representing a record in the
database.

Book book()
-----------
This instance method returns the book property of this object.

delete()
--------
This instance method deletes the record with the book id in the course\_book
table.

Boolean sample()
----------------
This instance method returns the sample property of this object.

sample(Boolean needed)
----------------------
This instance method sets the sample property of this object.

update()
--------
This instance method udpates the databaes with the property of the object.
