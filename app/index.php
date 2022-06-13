<?php
	declare(strict_types = 1);
	error_reporting(-1);
	session_start();
	require __DIR__ . '/../vendor/autoload.php';
	$router = new app\controllers\router($_SERVER['REQUEST_URI']);
?>