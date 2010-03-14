<?php

include_once("./config/config.php");
include_once("./php/functions.php");

session_start();
$_SESSION['RETURN_PAGE'] = $_SERVER['REQUEST_URI'];	
$style = "./css/$style";

$db = mysql_connect($db_address, $db_user_name, $db_password);
mysql_select_db($db_name, $db);
mysql_query("SET NAMES 'utf8'");
$sid = isset($_GET['sid']) ? $_GET['sid'] : null;

$sql = "SELECT track, title, album.album, artist.artist, genre, bitrate," .
		"length, file_size, year, encoder, song.file, comments, art.file, lyrics FROM song " .
		"INNER JOIN artist ON artist.id = song.artist_id " .
		"INNER JOIN album ON album.id = song.album_id " . 
		"LEFT JOIN art ON song.art_id = art.id " . 
		"WHERE song.id='$sid'";

$default_art = get_default_art($sid, $db);
$result = mysql_query($sql);
$row = mysql_fetch_array($result, MYSQL_BOTH);
mysql_close($db);

require_once('./php/smarty_init.php');
$smarty->assign('sid', $sid);
$smarty->assign('default_art', $default_art);
$smarty->assign('basename', basename($row[10]));
$smarty->assign('row', $row);
$smarty->assign('page_title', "Song Details");
$smarty->assign('body_template', 'details.tpl');
$smarty->display('default.tpl');
	
	?>

