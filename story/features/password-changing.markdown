Password-changing
=================
Need a login page and a login handler.

Password-changing Form
----------------------
This page has a form with fields for password and new password and confirmation
of new password.

This page must pass the W3C Markup Validation Service. http://validator.w3.org/

Style is not our concern at this moment.

Password-changing Handler
-------------------------
This page makes sure the new password and the confirmation of the new password
are the same. If they are not the same, return the user to the
password-changing page and tell the user that his new passwords don't match.

If the passwords are the same, updates the password of the user. Once that's
done, return the user to the password-change page and tell the use that he has
successfully changed his password.
