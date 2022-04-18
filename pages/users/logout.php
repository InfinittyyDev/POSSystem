<!--
.------------------------.
|  Infinity Development  |
|------------------------|
| Project: POS System;   |
|    Type: Logout Page;  |
|------------------------|
|      URL: localhost;   |
|  pos.blaze.productions |
'------------------------'
-->

<?php
	// Access the session by starting it
	session_start();
	// Destroy the session, removing "loggedin", id and username
	session_destroy();
	// Redirect back to the login page to avoid errors.
	header('Location: /');
?>