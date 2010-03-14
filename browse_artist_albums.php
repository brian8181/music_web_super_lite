<?php 
session_start();
include_once("./config/config.php");
include_once("./php/functions.php");
$back = isset( $_SESSION['RETURN_PAGE'] ) ? $_SESSION['RETURN_PAGE'] : "./browse_artist.php";
$_SESSION['RETURN_PAGE'] = $_SERVER['REQUEST_URI'];
$style = "./css/$style";

$aid = isset($_GET['aid']) ? $_GET['aid'] : null;
$filter = isset($_GET['filter']) ? $_GET['filter'] : null;
$rows = array();

if($aid != null)
{
	$db = mysql_connect($db_address, $db_user_name, $db_password);
	mysql_select_db($db_name, $db) or die(mysql_errno() . ": " . mysql_error() . "<br>");
	if(isset($filter) && strlen($filter) > 0)
	{
		$filter = mysql_real_escape_string( $filter );
		$filter = "AND song.file LIKE '/$filter/%'";
	}
	else
	{
		$filter = "";
	}
	// debug
	$filter = "";
	$sql = "SELECT DISTINCT album, art.file as art_file, album_id FROM song " . 
		"INNER JOIN album ON album_id=album.id " .
		"INNER JOIN artist ON artist_id=artist.id " . 
		"LEFT JOIN song_art ON song.id=song_id " .
		"LEFT JOIN art ON song_art.art_id=art.id " .
		"WHERE artist_id='$aid' $filter";
	
	$result = mysql_query($sql, $db);
	// For each result that we got from the Database
	while ($row = mysql_fetch_assoc($result))
	{
		$rows[] = $row;
	}
}  
require_once('./php/smarty_init.php');
$smarty->assign('aid', $aid);
$smarty->assign('numCols', 3);
// Assign this array to smarty...
$smarty->assign('rows', $rows);

$smarty->assign('page_title', "Artist Albums");
$smarty->assign('body_template', 'browse_artist_albums.tpl');
$smarty->display('default.tpl');

	?>  

