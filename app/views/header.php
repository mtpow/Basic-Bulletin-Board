<div id="main">
	<div>
		<h1><?php $forum->title; ?></h1>
	</div>
	<div>
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="application/x-www-form-urlencoded" target="_self">
			<input type="text" id="user" name="user" value="Username"><br>
			<input type="text" id="pass" name="pass" value="Password"><br>
			<input type="submit" value="Login">
			<input type="submit" value="Register">
		</form>
	</div> 
</div>