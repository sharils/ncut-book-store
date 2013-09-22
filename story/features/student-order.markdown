Student Order Management
========================

Student Order Listing
---------------------
We need to allow a student to see all orders he has. A clerk can see all
student orders students have submitted.

This page must pass the W3C Markup Validation Service. http://validator.w3.org/

Student Order Detail
--------------------
We need to allow an user to see the detail about an order.

What a clerk or a student can do with an order depends on the status of the
order. An order has the following status:

- shopping
- submitted
- processing
- ordered
- shipping
- arrived

### shopping ###

A student can:

- See the detail of the order
- Delete the order.
- Submit the order.
- Add a book from the order.
- Change the quantity of a book.
- Remove a book from the order.

A clerk can not see orders in this status.

### submitted ###

A student can:

- See the detail of the order

A clerk can:

- Process this order.

### processing ###

A student can:

- See the detail of the order

A clerk can:

- Send this order to the producer.

### ordered ###

A student can:

- See the detail of the order

A clerk can:

- Change this order to shipping.

### shipping ###

A student can:

- See the detail of the order
- Change this order to arrived.

### arrived ###

A student can:

- See the detail of the order
