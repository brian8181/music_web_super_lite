<?php
// includes
include_once("./config/config.php");
include_once("./php/functions.php");
include_once("./php/navbar.php");
// session
session_start();
$_SESSION['RETURN_PAGE']  = $_SERVER['REQUEST_URI'];
$logged_in = assert_login();
$style = $logged_in ? $_SESSION['USER_STYLE'] : "./css/$style";

// page
$pid = isset($_GET['pid']) ? $_GET['pid'] : null;

// std ini
$db = mysql_connect($db_address, $db_user_name, $db_password);
mysql_select_db($db_name, $db);
mysql_query("SET NAMES 'utf8'");
$order_by   = isset($_GET['order_by'])  ? $_GET['order_by']  : $default_order;
//infer sort col from order_by
$strs = explode(' ', $order_by);
$clicked  = $strs[0];

$result = mysql_query("SELECT name FROM playlists where id='$pid'");
$playlist_name = "Playlist View";
if($result)
{
	$row = mysql_fetch_row($result);
	if($row)
	{
		$playlist_name = $row[0];
	}
}

$sql = get_playlist($pid);
$nav_row = isset($_GET['nav_row']) ? $_GET['nav_row'] : 0;
print_playlist($sql, $db);
mysql_close($db);


/* display from template */
require_once('./php/smarty_init.php');
$smarty->assign('body_template', 'view_playlist.tpl');
$smarty->display('default.tpl');

	?>
