<?php
	include 'Header.php';
	echo "
		<div class='columns'>
			<span class='column'><a href='/'>Index</a> -> $params[0]</span>
			<span class='column'>Author</span>
			<span class='column'>Replies</span>
			<span class='column'>Views</span>
		</div>
	";
	foreach($threads as $thread) {
		echo "
			<div class='thread'>
				<span class='threadtitle'><a href='/$params[0]/".$thread['title']."/'>".$thread['title']."</a></span>
				<span class='threadauthor'><a href='/user/".$thread['author']."/'>".$thread['author']."</a></span>
				<span class='threadposts'>".$thread['posts']."</span>
				<span class='threadviews'>".$thread['views']."</span>
			</div>
		";
	}
	include 'Footer.php';
?>