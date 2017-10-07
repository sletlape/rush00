<!DOCTYPE html>
<html>
<head>
	<title>Store - Rush00</title>
</head>
<body>
<?php
include ("database_management.php");

if (($categories = get_categories()) != false && ($items = get_items()) != false) {
	echo "====== Categories =====<br />";
	print_r($categories);
	echo "<br />";

	echo "====== Items ======<br />";
	print_r($items);
	echo "<br />";
} else {
	/* If either the items or category files could not load properly, the user should be able to go back */
	echo "<p>Failed to load store.<br />";
	echo "<a href=\"index.php\">Click here to redirect back to the home page.</a></p>";
}
?>
</body>
</html>
