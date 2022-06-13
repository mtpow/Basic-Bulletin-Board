<?php
	include 'Header.php';
	foreach($threads as $thread) {
		echo "
			<div id='thread'>
				<span class='thread_title'>".$thread['title']."</span>
				<span class='thread_author'>".$thread['author']."</span>
				<span class='thread_posts'>".$thread['posts']."</span>
			</div>
		";
	}
	include 'Footer.php';
?>