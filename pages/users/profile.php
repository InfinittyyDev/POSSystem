<!--
.------------------------.
|  Infinity Development  |
|------------------------|
| Project: POS System;   |
|    Type: Profile Page; |
|------------------------|
|     URL: localhost;    |
|  pos.blaze.productions |
'------------------------'
-->

<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: /');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'admin_jack';
$DATABASE_PASS = 'e2ptcCKmzxbCJusTo2hy4qMVvXjcxEWsEp7CQgD5bb8T9jsHtz';
$DATABASE_NAME = 'admin_pos';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
$stmt = $con->prepare('SELECT password, email, rank FROM tblStaff WHERE id = ?');
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email, $rank);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>My Profile</title>
		<link href="../../assets/css/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>POS System</h1>
				<a href="../../pages/home"><i class="fas fa-home"></i>Home</a>
				<a href="../../pages/users/logout"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
      	<div id="navbar">
          <script>$(function(){$("#navbar").load("../../assets/reuse/nav.html");});</script>
      	</div>
		<div class="content">
			<h2>Profile Page</h2>
			<div>
				<p>Your account details are below:</p>
				<table>
					<tr>
						<td>Username:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Password Hash:</td>
						<td><?=$password?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$email?></td>
					</tr>
                  <tr>
						<td>Rank:</td>
						<td><?=$rank?></td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>