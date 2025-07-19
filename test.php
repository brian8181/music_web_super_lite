<?php
	echo 'Begin...';
	// put full path to Smarty.class.php
	require('/var/www/html/web/Smarty-3.1.19/libs/Smarty.class.php');
	$smarty = new Smarty();
	$smarty->setTemplateDir('/var/www/html/web/web_sl/templates');
	$smarty->setCompileDir('/var/www/html/web/web_sl/templates_c');
	$smarty->setCacheDir('/var/www/html/web/web_sl/cache');
	$smarty->setConfigDir('/var/www/html/web/web_sl/config');
	
	$smarty->assign('name', 'Ned');
	$smarty->display('test.tpl');
	echo 'Hell Yeah!'
?>