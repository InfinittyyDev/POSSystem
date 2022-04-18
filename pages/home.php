<!--
.------------------------.
|  Infinity Development  |
|------------------------|
|  Project: POS System;  |
|     Type: Home Page;   |
|------------------------|
|      URL: localhost;   |
|  pos.blaze.productions |
'------------------------'
-->

<?php
	session_start();
	if (!isset($_SESSION['loggedin'])) {
		header('Location: /');
		exit;
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home</title>
		<link href="../assets/css/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
      	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	</head>
	<body class="loggedin">
      	<div id="navbar">
          <script>
            $(function(){
              $("#navbar").load("../assets/reuse/nav.html");
            });
          </script>
      	</div>
		<div class="content">
			<h2>Home</h2>
			<p>Welcome back, <?=$_SESSION['name']?>!</p>
		</div>
	</body>
</html>