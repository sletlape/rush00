<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="header.css">
</head>
<body>
<?php
	include ("header.php");

	if ($_GET["success"] === "1") {
		echo "<p>Successfully registered user <span style='text-decoration: underline'>" . $_GET["login"] . "</span>. Please log in.</p>";
		echo file_get_contents("login-form.html");
	} else if ($_GET["error"] === "login_taken") {
		echo "<p>The username <span style='text-decoration: underline'>" . $_GET["login"] . "</span> is already taken. Please try another.</p>";
		echo file_get_contents("register-form.html");
	} else if ($_GET["error"] === "empty_login") {
		echo "<p>Username field cannot be empty.</p>";
		echo file_get_contents("login-form.html");
	} else if ($_GET["error"] === "empty_pass") {
		echo "<p>Password field cannot be empty.</p>";
		echo file_get_contents("login-form.html");
	} else if ($_GET["error"] === "no_such_user") {
		echo "<p>User <span style='text-decoration: underline'>" . $_GET["login"] . "</span> does not exist.</p>";
		echo file_get_contents("login-form.html");
	} else if ($_GET["error"] === "pass_mismatch") {
		echo "<p>The password you entered does not match the one in our database. Try again.</p>";
		echo file_get_contents("login-form.html");
	} else if ($_GET["type"] === "register") {
		echo file_get_contents("register-form.html");
	} else if ($_GET["type"] === "login") {
		echo file_get_contents("login-form.html");
	} else {
		echo "<p style='font-size: 150%; text-align: center;'>Welcome to the user portal.<br />";
		echo "<a href='portal.php?type=login'>Login</a> or <a href='portal.php?type=register'>Register</a></p>";
	}
?>
</body>
</html>