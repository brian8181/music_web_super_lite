{config_load file=music.conf}
<table class="Main" cellpadding="10" width="="100%">
	<tr>
		<td class="Padded" width="72%">
		<h2>Song Details:</h2>
		<ul>
			<li><strong>Track:</strong>&nbsp;<em>{$row.track}</em></li>
			<li><strong>Title:</strong>&nbsp;<em>{$row.title}</em></li>
			<li><strong>Album:</strong>&nbsp;<em>{$row.album}</em></li>
			<li><strong>Artist:</strong>&nbsp;<em>{$row.artist}</em></li>
			<li><strong>Genre:</strong>&nbsp;<em>{$row.genre}</em></li>
			<li><strong>Bitrate:</strong>&nbsp;<em>{$row.bitrate}</em></li>
			<li><strong>Length:</strong>&nbsp;<em>{$row.length}</em></li>
			<li><strong>Size:</strong>&nbsp;<em>{$row.file_size}</em></li>
			<li><strong>Year:</strong>&nbsp;<em>{$row.year}</em></li>
			<li><strong>EncodedBy:</strong>&nbsp;<em>{$row.encoder}</em></li>
			<li><strong>File:&nbsp;</strong>
			<em>
				<a href="$music_location{$row[10]}">{$basename}</a>
			</em>
			</li>
			<li><strong>Lyrics:</strong> 
			{if !empty( $row.lyrics )}
				<a href="lyrics.php?sid="{$sid}"><em>see</em></a>
			{else}
				<em>NA</em>
			{/if}
			</li>
		</ul>
		<dl>
			<dt><strong>Comments:</strong></dt>
			<dd><em>{$row.comments}</em></dd>
		</dl>
		</td>
		<td align="left">
		<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td id="lside" width="10">&nbsp;</td>
				<td><img
					src="{#art_location#}/large/{$default_art}"
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
