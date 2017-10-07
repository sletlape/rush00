<!DOCTYPE html>
<html>
<head>
	<title>Home - Rush00</title>
	<link rel="stylesheet" href="header.css">
	<link rel="stylesheet" href="/index.css">
</head>
<body>
<?php
	include ("header.php");
?>
<div id="main-content">
<?php
include ("database_management.php");

echo "<table id=\"category-table\" cellspacing=\"1em\"><tr>\n";
$x = 0;
foreach (get_categories() as $category) {
	if ($x > 3) {
		echo "</tr>\n<tr>\n";
		$x = 0;
	}
	echo "<td class=\"category\"><a href=\"/store.php?category=" . $category[0] . "\"><img class=\"category-image\" src=\"" . $category[1] . "\"><br/><span class=\"category-name\">" . $category[0] . "</span></a></td>\n";
	++$x;
}
echo "</tr></table>\n";
?>
</div>
</body>
</html>

