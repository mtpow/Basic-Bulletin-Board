<?php
	declare(strict_types = 1);
	error_reporting(-1);
	require __DIR__ . '/../vendor/autoload.php';
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<head>
	<title>BBB - Basic Bulletin Board</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="/assets/style.css">
</head>
<body>
<?php 
	$router = new app\controllers\router();
?>

</body>
</html>