
<?php
	require __DIR__ . '/../vendor/autoload.php';

	$log = new Monolog\Logger('name');
	$log->pushHandler(new Monolog\Handler\StreamHandler('app.log', Monolog\Logger::WARNING));
	$log->warning('Foo');
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
</body>
</html>