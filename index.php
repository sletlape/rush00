<!DOCTYPE html>
<html>
<head>
	<title>Home - Rush00</title>
	<link rel="stylesheet" href="/index.css">
</head>
<body>
<div id="header">
	<div id="home-button">
		<a href="/index.php" title="Home"><img src="resources/home.svg" class="navigation-image"></a>
	</div>
	<div id="cart-button" title="Cart">
		<a href="/cart.php"><img src="resources/basket.svg" class="navigation-image"></a>
	</div>
	<div id="login-button">
		<a href="/portal.php?type=login">Login</a> | <a href="/portal.php?type=register">Register</a>
	</div>
</div>
<div id="main-content">
<?php
include ("database_management.php");

echo "<table id=\"category-table\" cellspacing=\"1em\"><tr>\n";
$x = 0;
foreach (get_categories() as $category) {
	if ($x > 3) {
		echo "</tr>\n<tr>\n";
	}
	echo "<td class=\"category\"><a href=\"/store.php?category=" . $category[0] . "\"><img class=\"category-image\" src=\"" . $category[1] . "\"><br/><span class=\"category-name\">" . strtoupper($category[0]) . "</span></a></td>\n";
}
echo "</tr></table>\n";
?>
</div>
</body>
</html>

