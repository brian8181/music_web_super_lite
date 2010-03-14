<?php

/* includes */
require_once("./config/config.php");

/* session */
session_start();
$_SESSION['RETURN_PAGE'] = $_SERVER['REQUEST_URI'];
$_SESSION['SEARCH_PAGE_URI'] = $_SESSION['RETURN_PAGE'];
$last_query = isset($_SESSION['SEARCH_PAGE_QUERY']) ? $_SESSION['SEARCH_PAGE_QUERY'] : null;
if($last_query != null)
{
	parse_str($last_query);
}
$_SESSION['SEARCH_PAGE_QUERY'] = $_SERVER['QUERY_STRING'];

/* display from template */
require_once('./php/smarty_init.php');
//$smarty->caching = 1;
$smarty->assign('page_title', "Search Database");
$smarty->assign('body_template', 'query.tpl');
$smarty->display('default.tpl');

	?>
	
