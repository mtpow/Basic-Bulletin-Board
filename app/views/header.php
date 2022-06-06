<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<head>
	<title>BBB - Basic Bulletin Board</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="/assets/style.css">
</head>
<body>
	<div id="main">
		<div id="header">
			<div id="title">
				<h1><?php echo $this->title; ?></h1>
			</div>
			<div id="userpanel">
				<?php 
					if ($this->user->loggedIn) {
						echo '
							<span class="avatar"><img src="app/assets/avatars/'.$this->user->avatar.'.png" /></span>
							<span class="username">Welcome'.$this->user->username.'</span>
							<span class="messages">You have ('.$this->user->getMessageCount.') new messages</span>
						';
					} else { 
						echo '
							<span class="guest">Welcome Guest</span>
							<span class="loginregister">Please <a href="/login/">Login</a> or <a href="/register/">Register</a></span>
						';
					}
				?> 
					
			</div>
		</div>
	</div>