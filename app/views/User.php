<?php
	include 'Header.php';
	echo "
		<div class='columns'>
			<span class='username'>".$user['username']."</span>
			<span class='userposts'>".$user['postcount']." posts made</span>
			<span class='userthreads'>".$user['threadcount']." threads made</span>
			<span class='userdate'>joined on ".$user['joindate']."</span>
		</div>
	";
	foreach($posts as $post) {
		echo "
			<div class='postauthor'>
				<span class='postavatar'><img src='/../assets/images/avatars/".$post['avatar']."' /></span>
				<span class='postusername'><a href='/user/".$post['author']."'/>".$post['author']."</a></span>
			</div>
			<div class='post'>
				<div class='postcontent'>
					<div class='postdate'>".$post['date']."</div>
					<p class='posttext'>".$post['text']."</p>
				</div>
			</div>
		";
	}
	include 'Footer.php';
?>