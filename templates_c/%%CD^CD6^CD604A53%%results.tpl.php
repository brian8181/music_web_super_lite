<?php /* Smarty version 2.6.20, created on 2010-02-07 13:40:13
         compiled from results.tpl */ ?>
<center><a href="<?php echo $this->_tpl_vars['back']; ?>
"><b>Back To Search</b></a></center>
<br />
<script src="./script/querystring.enhanced.js" type="text/javascript"></script>
<script src="./script/functions.js" type="text/javascript"></script>
<br /><br /><b>Showing <?php echo $this->_tpl_vars['start_number']; ?>
 - <?php echo $this->_tpl_vars['end_number']; ?>
 of <?php echo $this->_tpl_vars['total']; ?>
</b>
<table id="result">
<tr class="header_row">
<th align="center">&nbsp;</th>
<th align="center">
	<a class="<?php if ($this->_tpl_vars['clicked'] == 'track'): ?>yellow_white<?php else: ?>white_yellow<?php endif; ?>"
	name="track" onclick="on_header_click(this)" 
	href="<?php echo $this->_tpl_vars['query']; ?>
">
	Track
	</a>
</th>
<th align="center">
	<a class="<?php if ($this->_tpl_vars['clicked'] == 'title'): ?>yellow_white<?php else: ?>white_yellow<?php endif; ?>"
	name="title" onclick="on_header_click(this)"
	href="<?php echo $this->_tpl_vars['query']; ?>
">
	Title
	</a>
</th>
<th align="center">
	<a class="<?php if ($this->_tpl_vars['clicked'] == 'album'): ?>yellow_white<?php else: ?>white_yellow<?php endif; ?>"
	name="album" onclick="on_header_click(this)" 
	href="<?php echo $this->_tpl_vars['query']; ?>
">
	Album
	</a>
</th>
<th align="center">
	<a class="<?php if ($this->_tpl_vars['clicked'] == 'artist'): ?>yellow_white<?php else: ?>white_yellow<?php endif; ?>"
	name="artist" onclick="on_header_click(this)" 
	href="<?php echo $this->_tpl_vars['query']; ?>
&clicked=artist">
	Artist
	</a>
</th>
<th>&nbsp;</th>
</tr>
<?php $_from = $this->_tpl_vars['result']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
<tr id="table_row">
<td>
	<a class="NoColor" href="./results.php?album=<?php echo $this->_tpl_vars['row']['album']; ?>
&artist=<?php echo $this->_tpl_vars['row']['artist']; ?>
&amp;order_by=artist,album,track,title">
		<img src="<?php echo $this->_config[0]['vars']['art_location']; ?>
/xsmall/<?php echo $this->_tpl_vars['row']['art_file']; ?>
" width="50" height="50" alt="NA"/>
	</a>
</td>
<td><?php echo $this->_tpl_vars['row']['track']; ?>
</td>
<td>
    <a href="details.php?sid=<?php echo $this->_tpl_vars['row']['sid']; ?>
"><?php echo $this->_tpl_vars['row']['title']; ?>
</a>
</td>
<td>
    <a href="results.php?album=<?php echo $this->_tpl_vars['row']['album']; ?>
&amp;order_by=artist,album,track,title"><?php echo $this->_tpl_vars['row']['album']; ?>
</a>
</td>
<td>
    <a href="results.php?artist=<?php echo $this->_tpl_vars['row']['artist']; ?>
&amp;order_by=artist,album,track,title"><?php echo $this->_tpl_vars['row']['artist']; ?>
</a>
</td>
<td align='center'>
	<a href="<?php echo $this->_config[0]['vars']['music_location']; ?>
<?php echo $this->_tpl_vars['row']['song_file']; ?>
">download</a>
</td>
</tr>
<?php endforeach; endif; unset($_from); ?>
</table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "nav_links.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>