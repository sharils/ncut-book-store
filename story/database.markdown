Database Module
===============
We need a Database module that deals with connection to the database.

Array execute(String query\_string, Array parameters)
-----------------------------------------------------
This is a static method. In the life of a request, whenever we need to query
the database. We simply do:

	$users = Database::execute(
		'SELECT * FROM `user` WHERE `id` = :id;',
		array(
			':id' => '12345'
		)
	);

Then $users contains the query result. If there is an error, it throws an
exception. What is thrown is subject to the implementation.

initialise(String host, String user, String password, String database)
----------------------------------------------------------------------
This is a static method. In index.php, we get the connection info from
settings.php and store these info as static properties in the Database module.
e.g.

	Database::initialise(
		$host,
		$user,
		$password,
		$database
	);
