<!--
.------------------------.
|  Infinity Development  |
|------------------------|
|  Project: POS System;  |
|   Type: Login Script;  |
|------------------------|
|      URL: localhost;   |
|  pos.blaze.productions |
'------------------------'
-->

<?php
// Set the timezone to stop MariaDB from crying.
date_default_timezone_set('Europe/London');

// Start the session
session_start();

// Define database login info, and use it to connect.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'admin_jack';
$DATABASE_PASS = 'e2ptcCKmzxbCJusTo2hy4qMVvXjcxEWsEp7CQgD5bb8T9jsHtz';
$DATABASE_NAME = 'admin_pos';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

// If Error curl response
if ( mysqli_connect_errno() ) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// If one is somehow empty ask for both again
if ( !isset($_POST['username'], $_POST['password']) ) {
	exit('Please fill both the username and password fields!');
}

// If connection successful, grab table & select id and hashed password for the username
if ($stmt = $con->prepare('SELECT id, password FROM tblStaff WHERE username = ?')) {
	// Bind username to 's'
	$stmt->bind_param('s', $_POST['username']);
	// Execute the query defined above
	$stmt->execute();
	// Store the database reply for use in a sec.
	$stmt->store_result();

	// If there's more than one row that comes back as valid, carry on.
	// Remember this only returns the rows that contain the username input by the user.
	if ($stmt->num_rows > 0) {
		// Bind the result
		$stmt->bind_result($id, $password);
		// Fetch the result
		$stmt->fetch();
		// Use the password verify function
		// Passwords are stored in the database as hashes by default. Resolve database password and check it against input. If true, carry on.
		if (password_verify($_POST['password'], $password)) {
			// Regen the session to add new info
			session_regenerate_id();
			// Add the name, id and set loggedin to true to allow access to homepage.
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $_POST['username'];
			$_SESSION['id'] = $id;
			// Redirect to home.php
			header('Location: ../home');
		} else {
			// Passwords do not match in the database
			header('Location: ../../invalid');
		}
	} else {
		// There are no rows with that username in the database
		header('Location: ../../invalid');
	}

	// We're done verifying. Wrap up the connection.
	$stmt->close();
}

?>