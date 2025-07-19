<?php
require_once("./config/config.php");

//BKP 
// Deprecated: Methods with the same name as their class will not be constructors in a future version of PHP; Smarty has a deprecated constructor
require_once(SMARTY_DIR . 'Smarty.class.php');

 

$smarty = new Smarty;
// setup Smarty    
$smarty->compile_check = $smarty_compile_check;
$smarty->debugging     = $smarty_debugging; 
// set up Smarty directories
$smarty->template_dir = PROJECT_DIR . 'templates';
$smarty->compile_dir  = PROJECT_DIR . 'templates_c';
$smarty->config_dir   = PROJECT_DIR . 'config';
$smarty->cache_dir    = PROJECT_DIR . 'cache';

	?>