<?php
session_start();
include_once("./config/config.php");
include_once("./php/navbar.php");
include_once("./php/functions.php");
$style = "./css/$style";
$album_id = isset($_GET['album_id']) ? $_GET['album_id'] : null;

// std ini
$db = mysql_connect($db_address, $db_user_name, $db_password);
mysql_select_db($db_name, $db);
mysql_query("SET NAMES 'utf8'");
$order_by  = isset($_GET['order_by'])   ? $_GET['order_by']  : $default_order;
//infer sort col from order_by
$strs = explode(' ', $order_by);
$clicked  = $strs[0];

// get album name
$result = mysql_query("SELECT album FROM album where id='$album_id'");
$album_name = "Album View";
if($result)
{
	$row = mysql_fetch_row($result);
	if($row)
	{
		$album_name = $row[0];
	}
}
$_SESSION['RETURN_PAGE'] = $_SERVER['REQUEST_URI'];

$sql = get_default_query();
$sql =  "$sql WHERE album_id=$album_id ORDER BY track";
$nav_row = isset($_GET['nav_row']) ? $_GET['nav_row'] : 0;
$result = mysql_query($sql, $db);

//print_album($sql, $db);

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

/* display from template */
require_once('./php/smarty_init.php');

$smarty->assign('page_title', 'Search Results');
$smarty->assign('back', '$back');
$smarty->assign('clicked', $clicked);
$smarty->assign('query', $_SERVER['REQUEST_URI']);
// Assign this array to smarty...
$smarty->assign('result', $rows);
//$smarty->assign('links', $links);

$smarty->assign('body_template', 'view_album.tpl');
$smarty->display('default.tpl');

?>