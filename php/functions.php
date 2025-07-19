<?php
// get the default query
/**
 * gets the default query string
 *
 * @return a sql query string
 */
function get_default_query()
{
	$sql =  "SELECT (SELECT art.file FROM song_art JOIN art ON song_art.art_id=art.id where song_art.song_id=song.id LIMIT 1) as art_file, " .
			"track, title, album, artist.artist as artist, song.file as song_file, song.id as sid, " .
			"user_cart.user_id, user_cart.removed_ts FROM song " . 			
			"LEFT JOIN artist ON artist.id = song.artist_id " .
			"LEFT JOIN album ON album.id = song.album_id " .
			"LEFT JOIN user_cart ON song.id = user_cart.song_id AND (user_id IS NULL OR removed_ts IS NULL)";
	return $sql;	
}
/**
 * Enter description here...
 *
 * @param unknown_type $song_id
 * @param unknown_type $db
 * @return unknown
 */
function get_default_art($song_id, $db)
{
	//TODO return first cover if no cover return first unknown!
	$sql = "SELECT `art`.`file` FROM art JOIN song_art ON art.id=song_art.art_id JOIN song ON song.id=song_art.song_id WHERE song.id=$song_id LIMIT 1";
	$result = mysql_query($sql, $db);
	$count = mysql_num_rows($result);
	if($count == 1)
	{
		$row = mysql_fetch_row($result);
		return $row[0]; 
	}
	return null;
}
// get all lyrics
/**
 * Enter description here...
 *
 * @return unknown
 */
function get_all_lyrics()
{
	$sql = get_default_query();
	return "$sql WHERE NOT lyrics IS NULL";
}
// get default playlist
/**
 * Enter description here...
 *
 * @param unknown_type $pid
 * @return unknown
 */
function get_playlist($pid)
{
	$sql = "SELECT art.file as art_file, track, title, album, artist.artist, song.file as song_file, song.id as sid,
			user_cart.user_id, user_cart.removed_ts, playlist_songs.`order` as `order` FROM song 
			LEFT JOIN artist ON artist.id = song.artist_id
			LEFT JOIN album ON album.id = song.album_id
			LEFT JOIN art ON song.art_id = art.id
			LEFT JOIN user_cart ON song.id = user_cart.song_id AND (user_id IS NULL OR removed_ts IS NULL )
			LEFT JOIN playlist_songs ON song.id = playlist_songs.song_id
			LEFT JOIN playlists ON playlists.id = playlist_songs.id
			WHERE playlist_id=$pid ORDER BY `order`";
	
	return $sql;
}
/**
 * Builds an SQL query to search database
 *
 * @param string $artist
 * @param string $album
 * @param string $title
 * @param string $genre
 * @param string $file
 * @param string $lyrics
 * @param string $order_by
 * @param string $wildcard
 * @param string $and
 * @return string
 */
function get_search( $artist=null, $album=null, $title=null, 
					 $genre=null,  $file=null,  $lyrics=null, 
					 $order_by=null, $wildcard=null, $and=null )
{
	// check for wildcards & strip escape characters
	if(isset($wildcard) && $wildcard == "on")
	{
		$album = str_replace( "*", "%", $album);
		$album = str_replace( "?", "_", $album);
		$artist = str_replace( "*", "%", $artist);
		$artist = str_replace( "?", "_", $artist);
		$title = str_replace( "*", "%", $title);
		$title = str_replace( "?", "_", $title);
		$genre = str_replace( "*", "%", $genre);
		$genre = str_replace( "?", "_", $genre);
		$file = str_replace( "*", "%", $file);
		$file = str_replace( "?", "_", $file);
		$lyrics = str_replace( "*", "%", $lyrics);
		$lyrics = str_replace( "?", "_", $lyrics);
	}
	else
	{
		$album = !empty( $album ) ? "%$album%" : "";
		$artist = !empty( $artist ) ? "%$artist%" : "";
		$title = !empty( $title ) ? "%$title%" : "";
		$genre = !empty( $genre ) ? "%$genre%" : "";
		$file = !empty( $file ) ? "%$file%" : "";
		$lyrics = !empty( $lyrics ) ? "%$lyrics%" : "";
	}
	$album = mysql_real_escape_string( $album );
	$artist = mysql_real_escape_string( $artist );
	$title = mysql_real_escape_string( $title );
	$genre = mysql_real_escape_string( $genre );
	$file = mysql_real_escape_string( $file );
	$order_by = mysql_real_escape_string( $order_by );
	
	// Build SQL
	$sql = get_default_query();
	$operator = '';
	
	//echo( $sql );
	$sql = "$sql WHERE";
	if( !empty( $artist ) )
	{
		$sql = "$sql (`artist`.`artist` LIKE '$artist')";
		$operator = ($and == "false") ? "OR" : "AND";
	}
	if( !empty( $album ) )
	{
		$sql = "$sql $operator (`album`.`album` LIKE '$album')";
		$operator = ($and == "false") ? "OR" : "AND";
	}
	if( !empty( $title ) )
	{
		$sql = "$sql $operator (`song`.`title` LIKE '$title')";
		$operator = ($and == "false") ? "OR" : "AND";
	}
	if( !empty( $genre ) )
	{
		$sql = "$sql $operator (`song`.`genre` LIKE '$genre')";
		$operator = ($and == "false") ? "OR" : "AND";
	}
	if( !empty( $file ) )
	{
		$sql = "$sql $operator (`song`.`file` LIKE '$file')";
		$operator = ($and == "false") ? "OR" : "AND";
	}
	if( !empty( $lyrics ) )
	{
		$sql = "$sql $operator (`song`.`lyrics` LIKE '$lyrics')";
	}
	if( !empty( $order_by ) )
		$sql = "$sql ORDER BY $order_by";
	return $sql;	
}
//
function init_navbar(&$nav)
{
	global $nav_row, $clicked, $order_dir;
			
	//nav bar
	$nav = new navbar;
	$nav->numrowsperpage = 50;
	$result = $nav->execute($sql, $db, "mysql");
	//get counts
	$total = $nav->total;
	$start_number = $nav->start_number;
	$end_number = $nav->end_number;
	
	return $result;
}

/**
 * Enter description here...
 *
 * @return unknown
 */
function get_query_string()
{
	// build a custom query string - for anchor tags
	$query = "?";
	foreach ($_GET as $key => $value)
	{
        switch ($key)
        {
			case "album":
			case "artist":
			case "title":
			case "file":
			case "genre":
			case "comments":
			case "listOption":
			case "and":	
			case "order_dir":						
            	$query .= "$key=$value&";
            	break;
         }
	}
	return rtrim($query, '&'); // trim off last &
}
//
/**
 * Enter description here...
 *
 */
function print_count()
{
	// print count
	if($result) {
		$num_rows = mysql_num_rows($result);
		echo( "<br /><br /><b>Showing $start_number - $end_number of $total</b>" );
	}	
}
/**
 * Enter description here...
 *
 * @param unknown_type $row
 * @param unknown_type $type
 * @return unknown
 */
function get_result_cells($row, $type)
{
	include_once("table_functions.php");
	$art_location = $GLOBALS['art_location'];
	
	$sid = $row['sid'];
	$track = $row['track'];
	$title = $row['title'];
	$artist = $row['artist'];
	$album = $row['album'];
	$song_file = $row['song_file'];
	// old style
	//$art_file = $row['art_file'];
	$art_file = $row['default_art'];
	
	$row_html = "";
	switch($type)
	{
		case "result":
			$row_html = $row_html . get_picture_cell($album, $artist, $art_location, $art_file);
			$row_html = $row_html . get_track_cell($track);
			$row_html = $row_html . get_title_cell($title, $sid);
			$row_html = $row_html . get_album_cell($album);
			$row_html = $row_html . get_artist_cell($artist);
			break;
		case "cart":
			break;
		case "playlist":
			break;			
	}
	
	return $row_html;
}
/**
 * Enter description here...
 *
 * @param unknown_type $row
 * @param unknown_type $type
 * @return unknown
 */
function get_result_row($row, $type)
{
	include_once("table_functions.php");
	$art_location = $GLOBALS['art_location'];
	$music_location = $GLOBALS['music_location'];
	
	$sid = $row['sid'];
	$track = $row['track'];
	$title = $row['title'];
	$artist = $row['artist'];
	$album = $row['album'];
	$song_file = $row['song_file'];
	$art_file = $row['art_file'];

	$row_html = "";
	$row_html = get_result_cells($row, $type);
	$row_html = "$row_html<td align='center'>
					<a href=\"$music_location$song_file\">download</a></td>";
					
	return $row_html;				
}
/**
 * Enter description here...
 *
 * @param unknown_type $sql
 * @param unknown_type $db
 */
function print_results($sql, $db)
{
	global $nav_row, $clicked, $order_dir;
			
	//nav bar
	$nav = new navbar;
	$nav->numrowsperpage = 50;
	$result = $nav->execute($sql, $db, "mysql");
	//get counts
	$total = $nav->total;
	$start_number = $nav->start_number;
	$end_number = $nav->end_number;
	$query = get_query_string();

	// print count
	if($result) {
		$num_rows = mysql_num_rows($result);
		echo( "<br /><br /><b>Showing $start_number - $end_number of $total</b>" );
	}
	
	// print headers
	?>
		<script src="./script/querystring.enhanced.js" type="text/javascript"></script>
		<script src="./script/functions.js" type="text/javascript"></script>
		<table id="result">
	    <tr class="header_row">
		<th align="center">&nbsp;</th>
		<th align="center">
			<a class="<?php echo( ($clicked == "track" ? "yellow_white" : "white_yellow") ) ?>"
			name="track" onclick="on_header_click(this)" 
			href="<?php echo("$query") ?>">
			Track
			</a>
		</th>
		<th align="center">
			<a class="<?php echo( ($clicked == "title" ? "yellow_white" : "white_yellow") ) ?>"
			name="title" onclick="on_header_click(this)"
			href="<?php echo("$query") ?>">
			Title
			</a>
		</th>
		<th align="center">
			<a class="<?php echo( ($clicked == "album" ? "yellow_white" : "white_yellow") ) ?>"
			name="album" onclick="on_header_click(this)" 
			href="<?php echo("$query") ?>">
			Album
			</a>
		</th>
		<th align="center">
			<a class="<?php echo( ($clicked == "artist" ? "yellow_white" : "white_yellow") ) ?>"
			name="artist" onclick="on_header_click(this)" 
			href="<?php echo("$query&clicked=artist") ?>">
			Artist
			</a>
		</th>
		<th>&nbsp;</th>
		</tr>
	<?php		
	
	// print data
	while( $row = mysql_fetch_assoc($result) )
	{
		$row['default_art'] = get_default_art($row['sid'], $db); 
		$row_html = get_result_row($row, "result");
		echo("<tr id=\"table_row\">$row_html</tr>");
	}
	?>
	</table>
	<br />
	<?php
	
	echo("<center>");
	// print nav bar
	$links = $nav->getlinks("all", "on");
	if($links != null)
	{
		for ($y = 0; $y < count($links); $y++) {
		  echo $links[$y] . "&nbsp;&nbsp;";
		}
	}
	echo("</center>");
}
// print a playlist table
/**
 * Enter description here...
 *
 * @param unknown_type $sql
 * @param unknown_type $db
 */
function print_playlist($sql, $db)
{
	global $nav_row, $clicked, $order_dir;
			
	//nav bar
	$nav = new navbar;
	$nav->numrowsperpage = 50;
	$result = $nav->execute($sql, $db, "mysql");
	//get counts
	$total = $nav->total;
	$start_number = $nav->start_number;
	$end_number = $nav->end_number;

	$query = get_query_string();
	
	// print count
	if($result) {
		$num_rows = mysql_num_rows($result);
		echo( "<br /><br /><b>Showing $start_number - $end_number of $total</b>" );
	}
	
	// print headers
	?>
		<script src="./script/querystring.enhanced.js" type="text/javascript"></script>
		<script src="./script/functions.js" type="text/javascript"></script>
	    <table id="result">
	    <tr class="header_row">
		<th align="center">&nbsp;</th>
		<th align="center">
			Order
		</th>
		<th align="center">
			Title
		</th>
		<th align="center">
			Album
		</th>
		<th align="center">
			Artist
		</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		</tr>
	<?php		

	$enable_security = $GLOBALS['enable_security'];
	$enable_direct_download = $GLOBALS['enable_direct_download'];
	$art_location = $GLOBALS['art_location'];
	$music_location = $GLOBALS['music_location'];
	$authorized = $authorized = !$enable_security || 
		(assert_login() && assert_group('power_user')); 
	      
	// print data
	while( $row = mysql_fetch_assoc($result) )
	{
		$sid = $row['sid'];
		$order = $row['order'];
		$title = $row['title'];
		$artist = $row['artist'];
		$album = $row['album'];
		$song_file = $row['song_file'];
		$art_file = $row['art_file'];
		
		$row_html = 
			"<td>
				<a class=\"NoColor\" href=\"./results.php?album=$album&artist=$artist&amp;order_by=artist,album,track,title\">
					<img src=\"$art_location/xsmall/$art_file\" width=\"50\" height=\"50\" alt=\"NA\"/>
				</a>
			</td>
			<td>$order</td>
			<td>
			    <a href=\"details.php?sid=$sid\">$title</a>
			</td>
			<td>
			    <a href=\"results.php?album=$album&amp;order_by=artist,album,track,title\">$album</a>
			</td>
			<td>
			    <a href=\"results.php?artist=$artist&amp;order_by=artist,album,track,title\">$artist</a>
			</td>";
				
		if( $authorized )
		{
			$incart = $row['user_id'];
			$removed = $row['removed_ts'];
			if($incart && !$removed) //was in cart and not removed
			{
				$row_html =  "$row_html<td align='center'><i>added to cart</i></td>
					<td align='center'><a href=\"./php/delete_from_cart.php?sid=$sid\">delete</a></td>";	
			}
			else
			{
				if($enable_direct_download)
				{
					$row_html =  "$row_html<td align='center'>
						<a href=\"$music_location$song_file\">download</a></td>";
				}
				else
				{
					$row_html = "$row_html<td align='center'>
						<a href=\"./php/download.php?sid=$sid\">download</a></td>";
				}
				$row_html = "$row_html<td align='center'>
					<a href=\"./php/add_to_cart.php?sid=$sid\">add&nbsp;to&nbsp;cart</a></td>";
			}
		}
		else
		{
			$row_html = "$row_html
						<td align='center'><em>download</em></td>
						<td align='center'><em>add&nbsp;to&nbsp;cart</em></td>";
		}
	   	echo("<tr id=\"table_row\">$row_html</tr>");
	}
	?>
	</table>
	<br />
	<?php
	
	echo("<center>");
	// print nav bar
	$links = $nav->getlinks("all", "on");
	if($links != null)
	{
		for ($y = 0; $y < count($links); $y++) {
		  echo $links[$y] . "&nbsp;&nbsp;";
		}
	}
	echo("</center>");
}

// print a playlist table
/**
 * Enter description here...
 *
 * @param unknown_type $sql
 * @param unknown_type $db
 */

/*
function print_album($sql, $db)
{
	global $nav_row, $clicked, $order_dir;
			
	//nav bar
	$nav = new navbar;
	$nav->numrowsperpage = 50;
	$result = $nav->execute($sql, $db, "mysql");
	//get counts
	$total = $nav->total;
	$start_number = $nav->start_number;
	$end_number = $nav->end_number;

	$query = get_query_string();

	// print count
	if($result) {
		$num_rows = mysql_num_rows($result);
		echo( "<br /><br /><b>Showing $start_number - $end_number of $total</b>" );
	}
	
	// print headers
	?>
		<script src="./script/querystring.enhanced.js" type="text/javascript"></script>
		<script src="./script/functions.js" type="text/javascript"></script>
		<table id="result">
	    <tr class="header_row">
		<th align="center">&nbsp;</th>
		<th align="center">
			Track
		</th>
		<th align="center">
			Title
		</th>
		<th align="center">
			Album
		</th>
		<th align="center">
			Artist
		</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		</tr>
	<?php		

	$enable_security = $GLOBALS['enable_security'];
	$enable_direct_download = $GLOBALS['enable_direct_download'];
	$art_location = $GLOBALS['art_location'];
	$music_location = $GLOBALS['music_location'];
	$authorized = $authorized = !$enable_security || 
		(assert_login() && assert_group('power_user')); 
	      
	// print data
	while( $row = mysql_fetch_assoc($result) )
	{
		$sid = $row['sid'];
		$track = $row['track'];
		$title = $row['title'];
		$artist = $row['artist'];
		$album = $row['album'];
		$song_file = $row['song_file'];
		$art_file = $row['art_file'];
		
		$row_html = 
			"<td>
				<a class=\"NoColor\" href=\"./results.php?album=$album&artist=$artist&amp;order_by=artist,album,track,title\">
					<img src=\"$art_location/xsmall/$art_file\" width=\"50\" height=\"50\" alt=\"NA\"/>
				</a>
			</td>
			<td>$track</td>
			<td>
			    <a href=\"details.php?sid=$sid\">$title</a>
			</td>
			<td>
			    <a href=\"results.php?album=$album&amp;order_by=artist,album,track,title\">$album</a>
			</td>
			<td>
			    <a href=\"results.php?artist=$artist&amp;order_by=artist,album,track,title\">$artist</a>
			</td>";
				
		if( $authorized )
		{
			$incart = $row['user_id'];
			$removed = $row['removed_ts'];
			if($incart && !$removed) //was in cart and not removed
			{
				$row_html =  "$row_html<td align='center'><i>added to cart</i></td>
					<td align='center'><a href=\"./php/delete_from_cart.php?sid=$sid\">delete</a></td>";	
			}
			else
			{
				if($enable_direct_download)
				{
					$row_html =  "$row_html<td align='center'>
						<a href=\"$music_location$song_file\">download</a></td>";
				}
				else
				{
					$row_html = "$row_html<td align='center'>
						<a href=\"./php/download.php?sid=$sid\">download</a></td>";
				}
				$row_html = "$row_html<td align='center'>
					<a href=\"./php/add_to_cart.php?sid=$sid\">add&nbsp;to&nbsp;cart</a></td>";
			}
		}
		else
		{
			$row_html = "$row_html
						<td align='center'><em>download</em></td>
						<td align='center'><em>add&nbsp;to&nbsp;cart</em></td>";
		}
	   	echo("<tr id=\"table_row\">$row_html</tr>");
	}
	?>
	</table>
	<br />
	<?php
	
	echo("<center>");
	// print nav bar
	$links = $nav->getlinks("all", "on");
	if($links != null)
	{
		for ($y = 0; $y < count($links); $y++) {
		  echo $links[$y] . "&nbsp;&nbsp;";
		}
	}
	echo("</center>");
}*/
	?>