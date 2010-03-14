<?php /* Smarty version 2.6.20, created on 2010-02-14 22:28:47
         compiled from details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'details.tpl', 1, false),)), $this); ?>
<?php echo smarty_function_config_load(array('file' => "music.conf"), $this);?>

<table class="Main" cellpadding="10" width="="100%">
	<tr>
		<td class="Padded" width="72%">
		<h2>Song Details:</h2>
		<ul>
			<li><strong>Track:</strong>&nbsp;<em><?php echo $this->_tpl_vars['row']['track']; ?>
</em></li>
			<li><strong>Title:</strong>&nbsp;<em><?php echo $this->_tpl_vars['row']['title']; ?>
</em></li>
			<li><strong>Album:</strong>&nbsp;<em><?php echo $this->_tpl_vars['row']['album']; ?>
</em></li>
			<li><strong>Artist:</strong>&nbsp;<em><?php echo $this->_tpl_vars['row']['artist']; ?>
</em></li>
			<li><strong>Genre:</strong>&nbsp;<em><?php echo $this->_tpl_vars['row']['genre']; ?>
</em></li>
			<li><strong>Bitrate:</strong>&nbsp;<em><?php echo $this->_tpl_vars['row']['bitrate']; ?>
</em></li>
			<li><strong>Length:</strong>&nbsp;<em><?php echo $this->_tpl_vars['row']['length']; ?>
</em></li>
			<li><strong>Size:</strong>&nbsp;<em><?php echo $this->_tpl_vars['row']['file_size']; ?>
</em></li>
			<li><strong>Year:</strong>&nbsp;<em><?php echo $this->_tpl_vars['row']['year']; ?>
</em></li>
			<li><strong>EncodedBy:</strong>&nbsp;<em><?php echo $this->_tpl_vars['row']['encoder']; ?>
</em></li>
			<li><strong>File:&nbsp;</strong>
			<em>
				<a href="$music_location<?php echo $this->_tpl_vars['row'][10]; ?>
"><?php echo $this->_tpl_vars['basename']; ?>
</a>
			</em>
			</li>
			<li><strong>Lyrics:</strong> 
			<?php if (! empty ( $this->_tpl_vars['row']['lyrics'] )): ?>
				<a href="lyrics.php?sid="<?php echo $this->_tpl_vars['sid']; ?>
"><em>see</em></a>
			<?php else: ?>
				<em>NA</em>
			<?php endif; ?>
			</li>
		</ul>
		<dl>
			<dt><strong>Comments:</strong></dt>
			<dd><em><?php echo $this->_tpl_vars['row']['comments']; ?>
</em></dd>
		</dl>
		</td>
		<td align="left">
		<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td id="lside" width="10">&nbsp;</td>
				<td><img
					src="<?php echo $this->_config[0]['vars']['art_location']; ?>
/large/<?php echo $this->_tpl_vars['default_art']; ?>
"
					alt="Cover Art" align="right" border="0" height="225" hspace="0"
					vspace="0" width="225" />
				</td>
				<td id="vdrop" width="20">&nbsp;&nbsp;&nbsp;&nbsp;</td>
			</tr>
			<tr>
				<td width="10"></td>
				<td id="hdrop" height="20"></td>
				<td id="cdrop" height="20"></td>
			</tr>
		</table>
		&nbsp;
		</td>
	</tr>
</table>