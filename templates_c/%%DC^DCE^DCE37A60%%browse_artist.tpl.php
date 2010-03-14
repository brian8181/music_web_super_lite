<?php /* Smarty version 2.6.20, created on 2010-02-14 22:29:03
         compiled from browse_artist.tpl */ ?>
<div align="center">
<?php if (isset ( $this->_tpl_vars['show_all'] ) && $this->_tpl_vars['show_all'] != 'true'): ?> 
	<a href="./browse_artist.php?nav_row=0&letter=&show_all=true">Full Albums</a>&nbsp;|&nbsp;
	Show All<br /><br />
	<?php $this->assign('view_state', 'show_all=false'); ?>
<?php else: ?>
	Full Albums&nbsp;|&nbsp;
    <a href="./browse_artist.php?nav_row=0&letter=&show_all=false">Show All</a><br /><br />
	<?php $this->assign('view_state', 'show_all=true'); ?>
<?php endif; ?>
	<a href="./browse_artist.php?nav_row=0&letter=A&<?php echo $this->_tpl_vars['view_state']; ?>
">A</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=B&<?php echo $this->_tpl_vars['view_state']; ?>
">B</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=C&<?php echo $this->_tpl_vars['view_state']; ?>
">C</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=D&<?php echo $this->_tpl_vars['view_state']; ?>
">D</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=E&<?php echo $this->_tpl_vars['view_state']; ?>
">E</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=F&<?php echo $this->_tpl_vars['view_state']; ?>
">F</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=G&<?php echo $this->_tpl_vars['view_state']; ?>
">G</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=H&<?php echo $this->_tpl_vars['view_state']; ?>
">H</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=I&<?php echo $this->_tpl_vars['view_state']; ?>
">I</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=J&<?php echo $this->_tpl_vars['view_state']; ?>
">J</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=K&<?php echo $this->_tpl_vars['view_state']; ?>
">K</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=L&<?php echo $this->_tpl_vars['view_state']; ?>
">L</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=M&<?php echo $this->_tpl_vars['view_state']; ?>
">M</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=N&<?php echo $this->_tpl_vars['view_state']; ?>
">N</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=O&<?php echo $this->_tpl_vars['view_state']; ?>
">O</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=P&<?php echo $this->_tpl_vars['view_state']; ?>
">P</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=Q&<?php echo $this->_tpl_vars['view_state']; ?>
">Q</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=R&<?php echo $this->_tpl_vars['view_state']; ?>
">R</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=S&<?php echo $this->_tpl_vars['view_state']; ?>
">S</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=T&<?php echo $this->_tpl_vars['view_state']; ?>
">T</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=U&<?php echo $this->_tpl_vars['view_state']; ?>
">U</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=V&<?php echo $this->_tpl_vars['view_state']; ?>
">V</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=W&<?php echo $this->_tpl_vars['view_state']; ?>
">W</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=X&<?php echo $this->_tpl_vars['view_state']; ?>
">X</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=Y&<?php echo $this->_tpl_vars['view_state']; ?>
">Y</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=Z&<?php echo $this->_tpl_vars['view_state']; ?>
">Z</a>&nbsp;&nbsp;
</div>
<br />
<div style="text-align: center">
<br />
<center>
<table cellpadding="3">
	<tr>
		<th style="text-align: left">Artist</th>
		<th style="text-align: center">Songs</th>
		<th style="text-align: center">Albums</th>
	</tr>
<?php $_from = $this->_tpl_vars['result']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
	<tr>
		<td style="text-align: left"><a href="browse_artist_albums.php?aid=<?php echo $this->_tpl_vars['row']['aid']; ?>
&filter=<?php echo $this->_tpl_vars['filters']; ?>
" /><?php echo $this->_tpl_vars['row']['artist']; ?>
</a></td>
		<td style="text-align: center"><?php echo $this->_tpl_vars['row']['song_count']; ?>
</td>
		<td style="text-align: center"><?php echo $this->_tpl_vars['row']['album_count']; ?>
</td>
	</tr>
<?php endforeach; endif; unset($_from); ?>
</table>
</center>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "nav_links.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>