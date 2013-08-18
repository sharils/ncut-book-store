User Creation
=============

User Creation Form
------------------
For now we only allow an admin to create a student. The form must contain
fields for sn, password and other information the student module needs for
creation of a student.

This page must pass the W3C Markup Validation Service. http://validator.w3.org/

Style is not our concern at this moment.

User Creation Handler
---------------------
This page validates the user creation information a user provided. If the login
information is incorrect. The user is redirected back to the user creation page
and shown a message telling the user what's wrong with the submission.

Otherwise, the user is created.
