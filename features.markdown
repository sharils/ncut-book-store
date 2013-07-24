Requirements
============

System
------

### Bootstrap ###

Only system admins exist on bootstrap.

- create database
- create database schema
- insert one system admin into database
- set php config

### Users ###

Def: A user can be a system admin, a student, a teacher or a shop keeper.

A user can reset its password when it forgets its password.

- Alice goes to password-resetting page
- Alice input her id. e.g. student id, teacher id.
- if Alice's email is not verified, tell Alice to contact the system admin.
  otherwise send a password-resetting email to the verified email.
- Send an email with a link to the verified email.
- Alice clicks on the link points to the system.
- In the link, Alice sees an update password form.
- The link is only valid once.

A user can update its password.

- Alice logs in.
- Alice goes to the password updating page.
- Alice inputs her new password.
- Alice confirms her new password.

Note: Passwords are salted.

Email verification is optional.

- Alice goes to the email verification page.
- Alice clicks on the validate button.
- The system sends a mail to the email she want to verify.
- Alice clicks on the link which opens in a new page.
- The system sets the email as verified.

A user can sign up. But all registration are modorated.

- Alice goes to the signup page.
- Alice chooses the type of user.
- Check if Alice is a robot.
- Alice submits her information.
- The system tells Alice to wait for activation.

A system admin can manage moderated accounts.

- The system admin goes to the moderation list.
- The system admin activates an account.

### Messenging ###

A user can send message to another user.

- Alice goes to the message-sending email.
- Alice chooses the role and id of the recipient.
- Alice edits the message.
- Alice sends the message.

A user can manage messages they get.

- Alice goes to the message-managing page.
- Alice choose to read or delete a message.
- Alice can reply to a message when she reads a message.

A user can put users in a black list.

- Alice goes to the message-managing page.
- Alice choose the role and id of the user to block.

A system admin
--------------

### User management ###

A system admin can create a system admin, a student, a teacher or a shop
keeper.

- A system admin goes to the user management page.
- A system admin chooses the role and id of a user.
- A system admin creates the user.

A system admin can delete / reset the password for a user.

- A system admin goes to the user management page.
- A system admin chooses the role and id of a user.
- A system admin delete or reset the password the user.

### Course management ###

A system admin can synchronise courses data with those on the course-choosing
system.

- A system admin goes to the course-managing page.
- A system admin click the sync button.

A teacher
---------

### Course management ###

A teacher can see all the courses it teaches.

- Bob logs in.
- Bob goes to the course list page.

A teacher can choose the books for a course.

- Bob goes to the course list page.
- Bob chooses a course.
- Bob sets the books for the course.

Note: The system keeps the records of historical choices of books for a course.

Note: When a teacher chooses the books for a course, the system suggests books
based on the historical data.

### Order management ###

A teacher can request a sample book.

- Bob goes to the course list page.
- Bob chooses a course.
- Bob set a "sample book" flag.

A shop keeper
-------------

### Product management ###

A shop keeper can choose what books are for sale from all books that are
choosen by teachers this year.

- Carol goes to the book listing page.
- Carol sees all books for all courses in this semester.
- Carol checks books she wants to sell.

A shop keeper can notify teachers who haven't choose books for a course.

- Carol goes to the course listing page.
- Carol chooses a course that doesn't have a book.
- Carol notifies the teachers that you need to set a book for the course.

A shop keeper can set how many books are available for a book.

- Carol goes to the book listing page.
- Carol sets the number of books.

### Order management ###

A shop keeper can update the progress info for orders from students.

- Carol goes to the order list.
- Carol choose an order.
- Carol set the progress info of the order.

A shop keeper can cancel an order.

- Carol goes to order listing page.
- Carol can cancel an order.
- The system remembers who canceled the order.

### Messenging ###

A shop keeper can send bulk messages.

- Carol goes to the message sending page.
- Carol choose teachers who haven't choose books for courses or students who
  haven't take their book.

A student
---------

### Course management ###

A student can set the courses it has choosen.

- David goes to the course list.
- David check courses he has taken.

### Shopping ###

A student can see books for all courses it has choosen.

- Eve goes to the book listing page.

A student can put books in a shopping cart.

- Eve goes to the book listing page.
- Eve chooses books she wants to put into the shopping cart.

A student can save the shopping cart as an order.

- Eve goes to her shopping cart.
- Eve clicks the save as link.
- Eve enters the name of the order.

A student can search for books.

- Eve goes to the book listing page.
- Eve inputs search criteria.

### Book change ###

A student can change book to the shop keeper.

TODO

### Order management ###

A student can submit an order any time.

- Eve goes to the order listing page.
- Eve chooses an order.
- Eve submits the order.

A student can cancel an order. TODO: the restriction needs to be specified.

TODO

A student will be warned if the same book exists in multiple orders.

A student can see historical order
