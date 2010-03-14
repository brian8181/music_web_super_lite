<?php
include_once("./config/config.php");
include_once("./module/header.php");

$db = $db = mysql_connect($db_address, $db_user_name, $db_password);
mysql_select_db($db_name, $db);
$sql = "SELECT id, name from playlists ORDER BY name";
$result = mysql_query($sql);
	
$result = mysql_query($sql, $db);
// For each result that we got from the Database
while ($line = mysql_fetch_assoc($result))
{
 $value[] = $line;
}
mysql_close($db);

/* display from template */
require_once('./php/smarty_init.php');
// Assign this array to smarty...
$smarty->assign('result', $value);
$smarty->assign('page_title', 'Playlists'); 
$smarty->assign('body_template', 'playlists.tpl');
$smarty->display('default.tpl');

	?>
