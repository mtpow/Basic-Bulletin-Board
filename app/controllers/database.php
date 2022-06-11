<?php
	namespace app\controllers;
	
	use PDO;
	use app\config\settings as settings;
	
	class database {
		
		private static $instance;
		public pdo $connection;
		
		public function __construct() {
			$this->connection = new PDO('mysql:host='.settings::HOST, settings::USER, settings::PASS);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->firstRun();
		}
		
		public static function instance() : self {
			if (self::$instance === null)
				self::$instance = new self;
			return self::$instance;
		}
		
		private function firstRun() : void {
			$this->connection->exec("CREATE DATABASE IF NOT EXISTS `settings::DB`;
                CREATE USER IF NOT EXISTS 'settings::USER'@'settings::HOST' IDENTIFIED BY 'settings::PASS';
                GRANT ALL ON `settings::DB`.* TO 'settings::USER'@'settings::HOST';
                FLUSH PRIVILEGES;");
			$this->connection->query("use ".settings::DB);

			$statement = "CREATE TABLE IF NOT EXISTS `users` (
				`id` INT AUTO_INCREMENT NOT NULL,
				`username` varchar(32),
				`hash` char(60),
				`email` varchar(64),
				PRIMARY KEY (`id`)) 
				CHARACTER SET utf8 COLLATE utf8_general_ci
			";
			$this->connection->query($statement);
		}
	}
	
?>