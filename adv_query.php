<?php

// includes
include_once("./config/config.php");
include_once("./php/functions.php");
// session
session_start();
$_SESSION['RETURN_PAGE'] = $_SERVER['REQUEST_URI'];
$_SESSION['SEARCH_PAGE_URI'] = $_SESSION['RETURN_PAGE'];

$last_query = isset($_SESSION['SEARCH_PAGE_QUERY']) ? $_SESSION['SEARCH_PAGE_QUERY'] : null;
if($last_query != null)
{
	parse_str($last_query);
}
$_SESSION['SEARCH_PAGE_QUERY'] = $_SERVER['QUERY_STRING'];

$album      = isset($_GET['album'])      ? $_GET['album']      : null;
$artist     = isset($_GET['artist'])     ? $_GET['artist']     : null;
$title      = isset($_GET['title'])      ? $_GET['title']      : null;
$genre      = isset($_GET['genre'])      ? $_GET['genre']      : null;
$file       = isset($_GET['file'])       ? $_GET['file']       : null;
$comments   = isset($_GET['comments'])   ? $_GET['comments']   : null;
$lyrics     = isset($_GET['lyrics'])     ? $_GET['lyrics']     : null;

require_once('./php/smarty_init.php');
//$smarty->caching = 1;
$smarty->assign('artist', $artist);
$smarty->assign('album', $album);
$smarty->assign('title', $title);
$smarty->assign('genre', $genre);
$smarty->assign('file', $file);
$smarty->assign('comments', $comments);
$smarty->assign('lyrics', $lyrics);
$smarty->assign('page_title', 'Advanced Search');
$smarty->assign('body_template', 'adv_query.tpl');
$smarty->display('default.tpl');

	?>
	
