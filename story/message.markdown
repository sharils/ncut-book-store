Message Module
--------------
We need a Message module to deal with message operation.

Message create(User sender, User receiver, String content)
----------------------------------------------------------
This static method inserts a record into the message table. And return a
Message object to represent the inserted record.

Messages find(User sender)
--------------------------
This static method returns an array of message objects. Representing the
messages sent by the sender.

Message from(int id)
--------------------
This static method returns a message object representing the message.

String content()
----------------
This instance method returns the actual content.

delete()
--------
This instance method deletes the message from the message table.

int id()
--------
This instance method returns the id of the message.

User receiver()
---------------
This instance method returns an user object representing the receiver.

User sender()
-------------
This instance method returns an user object representing the sender.
