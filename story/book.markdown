Book Module
===========

Book create(String author, String isbn, Float market\_price, String name, Float price, String remark, String type, String version)
----------------------------------------------------------------------------------------------------------------------------------
This static method inserts a record into the book table and returns a book
object representing the record.

Books find(String keyword)
--------------------------
This static method finds books that matches the keyword.

Book from(Int id)
-----------------
This static method returns a book object representing the record in the book
table.

String author()
---------------
This instance method returns the author property.

delete()
--------
This instance method deletes the record in the book table with the book id
stored.

Int id()
-------------
This instance method returns the id property.

String isbn()
-------------
This instance method returns the isbn property.

Float marketPrice()
-------------------
This instance method returns the marketPrice property.

String name()
-------------
This instance method returns the name property.

Float price()
-------------
This instance method returns the price property.

String remark()
---------------
This instance method returns the remark property.

String type()
-------------
This instance method returns the type property.

update()
--------
This instance method updates the record in the book table with the book id
stored in the object. Properties are synchronised to the database.

String version()
----------------
This instance method returns the version property.
