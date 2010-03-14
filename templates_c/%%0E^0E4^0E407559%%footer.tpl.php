<?php /* Smarty version 2.6.20, created on 2010-02-07 13:24:20
         compiled from footer.tpl */ ?>
<br />
<div style="text-align: center">
<a class="NoColor" href="http://validator.w3.org/check?uri=referer">
	<img src="./image/valid-xhtml10-blue.png" alt="Valid XHTML 1.0 Transitional" height="31" width="88" align="middle" />
</a>
</div>

<br />
<div style="text-align: center">
	<?php echo $this->_config[0]['vars']['mail_message']; ?>

	<br />
	<a href="mailto:<?php echo $this->_config[0]['vars']['admin_email']; ?>
?subject=Web Password"><?php echo $this->_config[0]['vars']['admin_email']; ?>
</a>
</div>
<br />
<span style="font-size: smaller;"><em>Version <?php echo $this->_config[0]['vars']['version']; ?>
 <?php echo $this->_config[0]['vars']['version_date']; ?>
 ~(Copyright &#169; 2008)</em></span>
</div>
</body>
</html>