<?php
session_start();
include_once("./config/config.php");
include_once("./php/functions.php");
$style = "./css/$style";

$db = mysql_connect($db_address, $db_user_name, $db_password);
mysql_select_db($db_name, $db);
mysql_query("SET NAMES 'utf8'");
/// get song id
$sid = isset($_GET['sid']) ? $_GET['sid'] : null;

if( isset( $sid ) )
{
	$sql = "SELECT title, lyrics from song WHERE song.id=$sid";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result, MYSQL_NUM);
	$title = $row[0];
	echo("<h2>$title</h2>");
	$lyrics = $row[1];
	$lyrics = str_replace( "\r\n", "<br />", $lyrics);
	echo( $lyrics );
	mysql_close($db);
}

/* display from template */
require_once('./php/smarty_init.php');
$smarty->assign('body_template', 'lyrics.tpl');
$smarty->display('default.tpl');

	?>
