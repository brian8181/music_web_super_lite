<?php

require_once('./php/smarty_init.php');
//$smarty->caching = 1;
$smarty->assign('page_title', "Music Database LE");
$smarty->assign('body_template', 'index.tpl');
$smarty->display('default.tpl');

	?>
	
