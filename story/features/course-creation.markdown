Course Creation
===============

Course Creation Form
--------------------
We need to allow an admin to create a course manually. The form must contain
fields for teacher, type, name, year.

The teacher field is a many-to-one control listing all teachers from the
database. Type, name and year are text inputs.

This page must pass the W3C Markup Validation Service. http://validator.w3.org/

Style is not our concern at this moment.

Course Creation Handler
-----------------------
This page validates the course creation information a user provided. If the
information is incorrect. The user is redirected back to the course creation
page and shown a message telling the user what's wrong with the submission.

Otherwise, the course is created.
