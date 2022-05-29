<div id="main">
	<div>
		<h1><?php //$forum->title; ?></h1>
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