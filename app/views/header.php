<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<head>
	<title>BBB - Basic Bulletin Board</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="/assets/style.css">
</head>
<body>
	<div id="header">
			<h1 id="title"><?php echo $this->title; ?></h1>
		<div id="userpanel">
			<?php 
				if ($this->user->loggedIn) {
					echo '
						<div id="loginbox">
							<span class="avatar"><img src="app/assets/avatars/'.$this->user->avatar.'.png" /></span>
							<span class="username">Welcome'.$this->user->username.'</span>
							<span class="messages">You have ('.$this->user->getMessageCount.') new messages</span>
						</div>
					';
				} else { 
					echo '
						<div id="loginbox">
							<span class="guest">Welcome Guest</span>
							<span class="loginregister">Please <a href="/login/">Login</a> or <a href="/register/">Register</a></span>
						</div>
						<img src="/assets/images/avatars/'.$this->user->avatar.'" id="useravatar" />
					';
				}
			?> 
		</div>
	</div>
	<div id="main">