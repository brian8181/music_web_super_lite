<?php /* Smarty version 2.6.20, created on 2010-02-07 13:40:13
         compiled from nav_links.tpl */ ?>
<br />
<center>
<?php $_from = $this->_tpl_vars['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?>
<?php echo $this->_tpl_vars['link']; ?>
 &nbsp;&nbsp;
<?php endforeach; endif; unset($_from); ?>
</center>
<br />