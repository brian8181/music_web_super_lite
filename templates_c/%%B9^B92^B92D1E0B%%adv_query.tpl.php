<?php /* Smarty version 2.6.20, created on 2010-03-14 09:27:11
         compiled from adv_query.tpl */ ?>
<center>
<form action="results.php" method="get">
<table>
	<tr>
		<td>Artist:&nbsp;</td>
		<td><input type="text" name="artist" value="<?php if (isset ( $this->_tpl_vars['artist'] )): ?><?php echo $this->_tpl_vars['artist']; ?>
<?php endif; ?>" /></td>
	</tr>
	<tr>
		<td>Album:&nbsp;</td>
		<td><input type="text" name="album" value="<?php if (isset ( $this->_tpl_vars['album'] )): ?><?php echo $this->_tpl_vars['album']; ?>
<?php endif; ?>" /></td>
	</tr>
	<tr>
		<td>Title:&nbsp;</td>
		<td><input type="text" name="title" value="<?php if (isset ( $this->_tpl_vars['title'] )): ?><?php echo $this->_tpl_vars['title']; ?>
<?php endif; ?>" /></td>
	</tr>
	<tr>
		<td>Genre:&nbsp;</td>
		<td><input type="text" name="genre" value="<?php if (isset ( $this->_tpl_vars['genre'] )): ?><?php echo $this->_tpl_vars['genre']; ?>
<?php endif; ?>" /></td>
	</tr>
	<tr>
		<td>Year:&nbsp;</td>
		<td><input type="text" name="year" value="<?php if (isset ( $this->_tpl_vars['year'] )): ?><?php echo $this->_tpl_vars['year']; ?>
<?php endif; ?>" /></td>
	</tr>
	<tr>
		<td>File:&nbsp;</td>
		<td><input type="text" name="file" value="<?php if (isset ( $this->_tpl_vars['file'] )): ?><?php echo $this->_tpl_vars['file']; ?>
<?php endif; ?>" /></td>
	</tr>
	<tr>
		<td>Comments:&nbsp;</td>
		<td><input type="text" name="comments" value="<?php if (isset ( $this->_tpl_vars['comments'] )): ?><?php echo $this->_tpl_vars['comments']; ?>
<?php endif; ?>" /></td>
	</tr>
	<tr>
		<td>Lyrics:&nbsp;</td>
		<td><input type="text" name="lyrics" value="<?php if (isset ( $this->_tpl_vars['lyrics'] )): ?><?php echo $this->_tpl_vars['lyrics']; ?>
<?php endif; ?>" /></td>
	</tr>
	<tr>
		<td colspan="2"><br />
		<div align="center">
		<fieldset>
		<legend>Boolean Modifier</legend>
			All&nbsp;<i>(AND)</i>&nbsp;<input type="radio" name="and" value="true" 
			<?php if (! isset ( $this->_tpl_vars['and'] ) || $this->_tpl_vars['and'] == 'true'): ?>"checked="checked"<?php endif; ?>/>
			Any<i>&nbsp;(OR)</i>&nbsp;<input type="radio" name="and" value="false" 
			<?php if (isset ( $this->_tpl_vars['and'] ) && $this->_tpl_vars['and'] == 'false'): ?> "checked="checked" <?php endif; ?> />
		</fieldset>
		</div>
		</td>
	</tr>
</table>
<br />
<input type="submit" value="Search" />&nbsp;&nbsp;
Use&nbsp;wildcards:&nbsp;<input name="wildcard" type="checkbox" value="on"<?php if (isset ( $this->_tpl_vars['wildcard'] )): ?>"checked="checked"<?php endif; ?>/>
<br />
</form>
</center>