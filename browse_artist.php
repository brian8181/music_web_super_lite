<?php 
session_start();
include_once("./config/config.php");
include_once("./php/functions.php");
include_once("./php/navbar.php");
$_SESSION['RETURN_PAGE'] = $_SERVER['REQUEST_URI'];
$style = "./css/$style";

//get set variables
$letter   = isset($_GET['letter'])    ? $_GET['letter']  : null;
$nav_row   = isset($_GET['nav_row'])  ? $_GET['nav_row']  : 0;
$show_all  = isset($_GET['show_all']) ? $_GET['show_all'] : null;

$filter = "";
$filters = "";
$db = mysql_connect( $db_address, $db_user_name, $db_password );
mysql_select_db( $db_name, $db );
mysql_query("SET NAMES 'utf8'");

$letter = isset($letter) ? mysql_real_escape_string($letter, $db) : 'A';
$view_state = "show_all=false";
     
if(isset($show_all) && $show_all != "true") {
      	  
}
else{
	
	$filter = "/albums/";
	$view_state = "show_all=true";
} 

$nav = new navbar();
$sql = '';
if( $letter != 'T' )
{
	$sql = "SELECT DISTINCT artist.id, artist FROM artist INNER JOIN song ON artist_id=artist.id " .
		"WHERE artist like CONCAT('$letter', '%') AND song.file LIKE CONCAT('$filter', '%') " .
		"UNION " .
		"SELECT artist.id, SUBSTRING(artist.artist, 5, LENGTH(artist.artist) - 1) FROM artist INNER JOIN song ON artist_id=artist.id " .
		"WHERE artist like CONCAT('The ', '$letter', '%') AND song.file LIKE CONCAT('$filter', '%') ORDER BY artist";
}
else
{
	$sql = "SELECT DISTINCT artist.id, artist FROM  artist INNER JOIN song ON artist_id=artist.id " .
		"WHERE ((artist LIKE 'T%' AND artist NOT LIKE 'The %') OR (artist LIKE 'The T%')) " .
		"AND song.file LIKE CONCAT('$filter', '%') ORDER BY artist";
}

$nav->numrowsperpage = 25;
$result = $nav->execute($sql, $db, 'mysql'); 
while( $row = mysql_fetch_row( $result ) )
{
	$aid = $row[0];
	// get counts
	$res = mysql_query("SELECT count(*) FROM song where artist_id=$aid", $db); 
	$r = mysql_fetch_row($res);
	$song_count = $r[0];
	
	$res = mysql_query("SELECT count(DISTINCT album_id) FROM song where artist_id=$aid", $db); 
	$r = mysql_fetch_row($res);
	$album_count = $r[0];
	
	$row_array = array();
	$row_array['aid'] = $aid;
	$row_array['song_count'] = $song_count;
	$row_array['album_count'] = $album_count;
	$row_array['artist'] = $row[1];
 	$value[] = $row_array;
}
mysql_close( $db );

$links = $nav->getlinks("all", "on");
/* display from template */
require_once('./php/smarty_init.php');
$smarty->assign('filters', $filter);
// Assign this array to smarty...
$smarty->assign('result', $value);
$smarty->assign('links', $links);
$smarty->assign('page_title', "Browse Artist");
$smarty->assign('body_template', 'browse_artist.tpl');
$smarty->display('default.tpl');

?>
 