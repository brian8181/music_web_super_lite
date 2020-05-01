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

// put full path to Smarty.class.php
/* require('/var/www/html/web/Smarty-3.1.19/libs/Smarty.class.php');
$smarty = new Smarty();
$smarty->setTemplateDir('/var/www/html/web/web_sl/templates');
$smarty->setCompileDir('/var/www/html/web/web_sl/templates_c');
$smarty->setCacheDir('/var/www/html/web/web_sl/cache');
$smarty->setConfigDir('/var/www/html/web/web_sl/config');
 */

$smarty->caching = 1;
$smarty->assign('page_title', "Search Database");
$smarty->assign('body_template', 'query.tpl');
$smarty->display('default.tpl');
echo "Yeah";
	?>
	
