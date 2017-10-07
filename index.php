<a href="/store.php">Store</a>
<?php
include ("database_management.php");

function write_category($category) {
	echo "<div class=\"category\">";
	echo "<img class=\"category-image\" src=\"" . $category[1] . "\">";
	echo "<div class=\"category-name\">" . $category[0] . "</div>";
	echo "</div>";
}

foreach (get_categories() as $category) {
	write_category($category);
}
?>