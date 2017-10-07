<?php
session_start();
include("database_management.php");

if ($_GET["type"] === "register") {
	if ($_POST["login"] && $_POST["passwd"] && $_POST["passwd"] === $_POST["passwd_conf"]) {
		if (exists_user($_POST["login"])) {
			header("Location: portal.php?error=login_taken&login=" . $_POST["login"]);
			exit();
		} else {
			if (set_user($_POST["login"], $_POST["passwd"]) == false) {
				header("Location: portal.php?error=unknown");
				exit();
			} else {
				header("Location: portal.php?success=1&login=" . $_POST["login"]);
				exit();
			}
		}
	}
} else if ($_GET["type"] === "login") {
	if (!$_POST["login"]) {
		header("Location: portal.php?error=empty_login");
		exit();
	} else if (!$_POST["passwd"]) {
		header("Location: portal.php?error=empty_pass");
		exit();
	} else if (!exists_user($_POST["login"])) {
		header("Location: portal.php?error=no_such_user&" . $_POST["login"]);
		exit();
	} else {
		foreach (get_users() as $user) {
			if ($user[0] === $_POST["login"]) {
				if ($user[1] === hash_pass($_POST["passwd"])) {
					$_SESSION["login"] = $user[0];
					header("Location: index.php");
					exit();
				} else {
					header("Location: portal.php?error=pass_mismatch");
					exit();
				}
			}
		}
	}
} else if ($_GET["type"] === "logout") {
	$_SESSION["login"] = null;
	header("Location: index.php");
	exit();
}
?>

