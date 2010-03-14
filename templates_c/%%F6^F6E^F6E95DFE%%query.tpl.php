<?php /* Smarty version 2.6.20, created on 2010-02-07 13:39:47
         compiled from query.tpl */ ?>
<form name="search_form" onsubmit="return on_query_submit(search_form)" action="results.php" method="get">
	<div style="text-align: center">
		<div style="text-align: center">
			<h3>Search For:  </h3>
		</div>
		<input type="text" name="album" align="right"value=""/>
		<input type="hidden" name="artist" />
		<input type="hidden" name="title" />
		<input type="hidden" name="file" />
		<input type="hidden" name="genre" />
		<input type="hidden" name="comments" />
		<input type="hidden" name="lyrics" />
		<input type="hidden" name="and" value="false" />
		<input type="hidden" name="order_by" value="<?php echo $this->_config[0]['vars']['default_order']; ?>
" />
		<input type="submit" value="Search" />
		in fields 
				<?php $this->assign('listOption', '0'); ?>
		<select name="listOption" size="0">
			<option value="0"<?php if ($this->_tpl_vars['listOption'] == '0'): ?> selected="yes"<?php endif; ?>>All</option>
			<option value="1"<?php if ($this->_tpl_vars['listOption'] == '1'): ?> selected="yes"<?php endif; ?>>Title</option>
			<option value="2"<?php if ($this->_tpl_vars['listOption'] == '2'): ?> selected="yes"<?php endif; ?>>Album</option>
			<option value="3"<?php if ($this->_tpl_vars['listOption'] == '3'): ?> selected="yes"<?php endif; ?>>Artist</option>
			<option value="4"<?php if ($this->_tpl_vars['listOption'] == '4'): ?> selected="yes"<?php endif; ?>>File</option>
			<option value="5"<?php if ($this->_tpl_vars['listOption'] == '5'): ?> selected="yes"<?php endif; ?>>Lyrics</option>
		</select>
		use wildcards:
		<input name="wildcard" type="checkbox" value="on"<?php if (isset ( $this->_tpl_vars['wildcard'] )): ?> checked="yes"<?php endif; ?>/>
	</div>
</form>