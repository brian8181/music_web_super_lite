<?php /* Smarty version 2.6.20, created on 2010-02-07 13:24:19
         compiled from header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'header.tpl', 4, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title><?php echo ((is_array($_tmp=@$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('default', true, $_tmp, 'Default') : smarty_modifier_default($_tmp, 'Default')); ?>
</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="./favicon.png" />
	<link rel="stylesheet" type="text/css" href="./css/blue.css" />
	<script src="./script/functions.js" type="text/javascript"></script>
<?php if (isset ( $this->_tpl_vars['headers'] )): ?>
<?php echo $this->_tpl_vars['headers']; ?>

<?php endif; ?>
</head>
<body>
<div class="text_area">
<div class="box" style="text-align: center">
<h1><?php echo ((is_array($_tmp=@$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('default', true, $_tmp, 'Default') : smarty_modifier_default($_tmp, 'Default')); ?>
</h1>
</div>