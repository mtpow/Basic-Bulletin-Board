<?php
	include 'Header.php';
	echo "
		<div class='columns'>
			<span class='column'><a href='/'>Index</a> -> <a href='/".$params[0]."/'>".$params[0]."</a> -> ".$params[1]."</span>
			
	";
	$postnumber = 1;
	foreach($posts as $post) {
		echo "
			<div class='postauthor'>
				<span class='postavatar'><img src='/../assets/images/avatars/".$post['avatar']."' /></span>
				<span class='postusername'><a href='/user/".$post['author']."'/>".$post['author']."</a></span>
			</div>
			<div class='post'>
				<div class='postcontent'>
					<div class='postnumber'><a href='#$postnumber' id='$postnumber'>#$postnumber</a></div>
					<div class='postdate'>".$post['date']."</div>
					<p class='posttext'>".$post['text']."</p>
				</div>
			</div>
		";
		$postnumber++;
	}
	include 'Footer.php';
?>