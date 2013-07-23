Requirements
============

System
------

### Bootstrap ###

Only system admins exist on bootstrap.

### Users ###

A user can be a system admin, a student, a teacher or a shop keeper.

A user can reset their password if their email address is verified.

Passwords are salted.

Email verification is optional.

A user can sign up. But all registration are modorated.

### Messenging ###

A user can send message to another user.

A user can manage messages they get.

A system admin
--------------

### User management ###

A system admin can create a system admin, a student, a teacher or a shop
keeper.

### Course management ###

A system admin can synchronise courses data with those on the course-choosing
system.

A teacher
---------

### Course management ###

A teacher can see all the courses it teaches.

A teacher can choose the books for a course.

The system keeps the records of historical choices of books for a course.

When a teacher chooses the books for a course, the system suggests books based
on the historical data.

### Order management ###

A teacher can request a sample book.

A shop keeper
-------------

### Product management ###

A shop keeper can choose what books are for sale from all books that are
choosen by teachers this year.

A shop keeper can set how many books are available for a book.

### Order management ###

A shop keeper can update the progress info for orders from students.

A shop keeper can cancel an order. TODO: the restriction needs to be specified.

A student
---------

### Course management ###

A student can set the courses it has choosen.

### Shopping ###

A student can see books for all courses it has choosen. Whether to show all
books or only books for sale is a debate.

A student can put books in a shopping cart.

A student can save the shopping cart as an order.

A student can search for books. TODO: possible critiria needs to be specified.

### Returning ###

A student can return book to the shop keeper.

### Order management ###

A student can submit an order any time.

A student can cancel an order. TODO: the restriction needs to be specified.

A student will be warned if the same book exists in multiple orders.
