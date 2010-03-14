<div align="center">
{if isset($show_all) && $show_all != "true"} 
	<a href="./browse_artist.php?nav_row=0&letter={*$letter*}&show_all=true">Full Albums</a>&nbsp;|&nbsp;
	Show All<br /><br />
	{assign var=view_state value='show_all=false'}
{else}
	Full Albums&nbsp;|&nbsp;
    <a href="./browse_artist.php?nav_row=0&letter={*$letter*}&show_all=false">Show All</a><br /><br />
	{assign var=view_state value='show_all=true'}
{/if}
	<a href="./browse_artist.php?nav_row=0&letter=A&{$view_state}">A</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=B&{$view_state}">B</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=C&{$view_state}">C</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=D&{$view_state}">D</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=E&{$view_state}">E</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=F&{$view_state}">F</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=G&{$view_state}">G</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=H&{$view_state}">H</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=I&{$view_state}">I</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=J&{$view_state}">J</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=K&{$view_state}">K</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=L&{$view_state}">L</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=M&{$view_state}">M</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=N&{$view_state}">N</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=O&{$view_state}">O</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=P&{$view_state}">P</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=Q&{$view_state}">Q</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=R&{$view_state}">R</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=S&{$view_state}">S</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=T&{$view_state}">T</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=U&{$view_state}">U</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=V&{$view_state}">V</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=W&{$view_state}">W</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=X&{$view_state}">X</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=Y&{$view_state}">Y</a>&nbsp;&nbsp;
	<a href="./browse_artist.php?nav_row=0&letter=Z&{$view_state}">Z</a>&nbsp;&nbsp;
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
{foreach from=$result item=row}
	<tr>
		<td style="text-align: left"><a href="browse_artist_albums.php?aid={$row.aid}&filter={$filters}" />{$row.artist}</a></td>
		<td style="text-align: center">{$row.song_count}</td>
		<td style="text-align: center">{$row.album_count}</td>
	</tr>
{/foreach}
</table>
</center>
</div>
{include file="nav_links.tpl"}