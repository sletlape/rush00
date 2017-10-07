<?php
define("USER_FILE", "resources/users.csv");
define("ITEM_FILE", "resources/items.csv");
define("CATEGORY_FILE", "resources/categories.csv");

define("ITEM_FIELD_COUNT", 3);

/* ===== USER RELATED STUFF ===== */
function get_users()
{
	$ret = null;
	if (($fr = fopen(USER_FILE, "r")) != false) {
		$ret[] = fgetcsv($fr);
		fclose($fr);
	}
	return ($ret);
}

function set_user($login, $password)
{
	if (exists_user($login))
		return (false);
	if (($fr = fopen(USER_FILE, "a")) != false) {
		fputcsv($fr, array($login, hash_pass($password)));
		fclose($fr);
		return (true);
	}
	return (false);
}

function exists_user($login) {
	foreach (get_users() as $user) {
		if ($user[0] === $login) {
			return (true);
		}
	}
	return (false);
}

function hash_pass($passwd) {
	return (hash("whirlpool", $passwd));
}

/* ===== ITEM RELATED STUFF ===== */
function get_items()
{
	if (($fr = fopen(ITEM_FILE, "r")) == false)
		return (false);
	$ret = null;
	while (($line = fgetcsv($fr)) != null) {
		$ret[] = $line;
	}
	fclose($fr);
	return ($ret);
}

function add_item($item)
{
	if (count($item) != ITEM_FIELD_COUNT)
		return (false);
	if (($fr = fopen(ITEM_FILE, "a")) == false)
		return (false);
	fputcsv($fr, $item);
	fclose($fr);
	return (true);
}

function mod_item($itemname, $newitem)
{
	if (($items = get_items()) == false)
		return (false);
	if (($fr = fopen(ITEM_FILE, "w")) == false)
		return (false);
	foreach ($items as $item) {
		if ($item[0] === $itemname) {
			fputcsv($fr, $newitem);
		} else {
			fputcsv($fr, $item);
		}
	}
	fclose($fr);
}

function set_all_items($items)
{
	if (($fr = fopen(ITEM_FILE, "w")) == false)
		return (false);
	foreach ($items as $item) {
		fputcsv($fr, $item);
	}
	fclose($fr);
	return (true);
}

/* ===== CATEGORY RELATED STUFF ===== */
function get_categories()
{
	if (($fr = fopen(CATEGORY_FILE, "r")) == false)
		return (false);
	$ret = null;
	while (($line = fgetcsv($fr)) != null) {
		$ret[] = $line;
	}
	fclose($fr);
	return ($ret);
}

function add_category($category)
{
	if (($categories = get_categories()) == false)
		return (false);
	if (($fr = fopen(CATEGORY_FILE, "w")) == false)
		return (false);
	$categories[] = $category;
	fputcsv($fr, $categories);
	fclose($fr);
}

function del_category($category) {
	if (($categories = get_categories()) == false)
		return (false);
	foreach ($categories as $key => $value) {
		if ($value[0] === $category) {
			unset($categories[$key]);
			if (($fr = fopen(CATEGORY_FILE, "w")) == false)
				return (false);
			fputcsv($fr, $categories);
			fclose($fr);
			return (true);
		}
	}
}

?>