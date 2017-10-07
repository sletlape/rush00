<!DOCTYPE html>
<html>
<head>
	<title>Store - Rush00</title>
	<link rel="stylesheet" href="header.css">
	<link rel="stylesheet" href="store.css">
</head>
<body>
<?php
	include ("header.php");
?>
<table class=\"items-table\">
	<tr>
		<th>Item</th>
		<th>Category</th>
		<th>Price</th>
	</tr>
<?php
include ("database_management.php");

if ($_GET["category"]) {
	foreach (get_items() as $item) {
		if ($item[1] === $_GET["category"]) {
			echo "<tr>\n";
			echo "<td>" . $item[0] . "</td>\n";
			echo "<td>" . $item[1] . "</td>\n";
			echo "<td>" . $item[2] . "</td>\n";
			echo "</tr>\n";
		}
	}
}
?>
</table>
</body>
</html>
