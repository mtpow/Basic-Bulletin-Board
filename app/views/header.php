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
		<div>
			<h1><?php //echo settings::TITLE; ?></h1>
		</div>
		<div>
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="application/x-www-form-urlencoded" target="_self">
				<input type="hidden" name="hidden" value="login">
				<input type="text" name="user" value="Username"><br>
				<input type="text" name="pass" value="Password"><br>
				<input type="submit" name="login" value="Login">
				<input type="submit" name="register" value="Register">
			</form>
		</div>
	</div>