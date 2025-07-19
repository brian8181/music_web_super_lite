<?php
// includes
include_once("./config/config.php");
include_once("./php/functions.php");
include_once("./php/navbar.php");

// session
session_start();
$_SESSION['RETURN_PAGE']  = $_SERVER['REQUEST_URI'];

// page init
$album      = isset($_GET['album'])      ? $_GET['album']      : null;
$artist     = isset($_GET['artist'])     ? $_GET['artist']     : null;
$title      = isset($_GET['title'])      ? $_GET['title']      : null;
$genre      = isset($_GET['genre'])      ? $_GET['genre']      : null;
$file       = isset($_GET['file'])       ? $_GET['file']       : null;
$comments   = isset($_GET['comments'])   ? $_GET['comments']   : null;
$lyrics     = isset($_GET['lyrics'])     ? $_GET['lyrics']     : null;
$and        = isset($_GET['and'])        ? $_GET['and']        : null;
$wildcard   = isset($_GET['wildcard'])   ? $_GET['wildcard']   : null;
$pid        = isset($_GET['pid'])        ? $_GET['pid']        : null;
$order_by   = isset($_GET['order_by'])   ? $_GET['order_by']   : $default_order;
$back       = isset( $_SESSION['SEARCH_PAGE'] ) ? $_SESSION['SEARCH_PAGE'] : "./index.php";
//infer sort col from order_by
$strs = explode(' ', $order_by);
$clicked  = $strs[0];

/* connect to db */
$db = mysql_connect($db_address, $db_user_name, $db_password);
mysql_select_db($db_name, $db);
mysql_query("SET NAMES 'utf8'");
// build the sql query
$uid = isset($_SESSION['USER_ID']) ? $_SESSION['USER_ID'] : null;
$sql = get_search($artist, $album, $title, $genre, $file, $lyrics, $order_by, $wildcard, $and);
$nav_row = isset($_GET['nav_row']) ? $_GET['nav_row'] : 0;

/* init nav bar */
$nav = new navbar;
$nav->numrowsperpage = 50;
$result = $nav->execute($sql, $db, "mysql");
//get counts
$total = $nav->total;
$start_number = $nav->start_number;
$end_number = $nav->end_number;
$links = $nav->getlinks("all", "on");
	
// For each result that we got from the Database
$rows = array();
while ($row = mysql_fetch_assoc($result))
{
	// art not available
	if( empty($row['art_file']) )
	{
		$row['art_file'] = 'NA.JPG';
	}
 	$rows[] = $row;
}
mysql_close($db);

/* print from template */ 
require_once('./php/smarty_init.php');
$smarty->assign('page_title', 'Search Results');
$smarty->assign('back', $back);
$smarty->assign('clicked', $clicked);
$smarty->assign('query', $_SERVER['REQUEST_URI']);
// Assign this array to smarty...
$smarty->assign('start_number', $start_number);
$smarty->assign('end_number', $end_number);
$smarty->assign('total', $total);
$smarty->assign('result', $rows);
$smarty->assign('links', $links);
$smarty->assign('body_template', 'results.tpl');
$smarty->display('default.tpl');

	?> 