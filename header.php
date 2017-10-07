<?php
session_start();

echo "<div id='header'>\n";
echo "<div id='home-button'>\n";
echo "<a href='/index.php' title='Home'><img src='resources/home.svg' class='navigation-image'></a>\n";
echo "</div>\n";
echo "<div id='cart-button' title='Cart'>\n";
echo "<a href='/cart.php'><img src='resources/basket.svg' class='navigation-image'></a>\n";
echo "</div>\n";
echo "<div id='login-button'>\n";
if ($_SESSION["login"]) {
	echo "Hello, " . "<a href='profile.php'>" . $_SESSION["login"] . "</a>";
}
echo "<a href='/portal.php?type=login'>Login</a> | <a href='/portal.php?type=register'>Register</a>\n";
echo "</div> \n";
echo "</div>\n";
?>