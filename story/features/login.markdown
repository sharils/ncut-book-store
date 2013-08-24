Login
=====
Need a login page and a login handler.

Login Form
----------
This page has a form with fields for username, password and role in the system.
Roles are admin, clerk, student, teacher.

This page must pass the W3C Markup Validation Service. http://validator.w3.org/

Style is not our concern at this moment.

Login Handler
-------------
This page validates the login information a user provided. If the login
information is incorrect, the user is redirected back to the login page and
shown a message telling the user that their login information is incorrect.

Otherwise, the user is redirected to the welcome page and the user\_id and the
user\_role are stored in the session.
