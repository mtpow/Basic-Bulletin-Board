<?php
	namespace app\controllers;
	
	use PDO;
	use app\config\settings as settings;
	
	class database {
		
		private $connection;
		private $database;
		private $user;
		private $password;
		private $host;
		
		public function __construct() {
			$this->user = settings::USER;
			$this->pass = settings::PASS;
			$this->host = settings::HOST;
			$this->db = settings::DB;
			$this->connection = $this->connect();
			$this->firstRun();
		}
		
		public function getConnection() : object {
			if ($this->connection == NULL)
				$this->connection = $this->connect();
			
			return $this->connection;
		}
		
		private function connect() : object {
			$connection = new PDO('mysql:host='.$this->host, $this->user, $this->pass);
			$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $connection;
		}
		
		private function firstRun() : void {
			if (!$this->checkDatabase()) {
				$this->createDatabase();
			}
			$this->selectDatabase();
			$statement = "CREATE TABLE IF NOT EXISTS `settings` (
				`id` INT AUTO_INCREMENT NOT NULL,
				`title` varchar(32),
				`subtitle` TEXT,
				PRIMARY KEY (`id`)) 
				CHARACTER SET utf8 COLLATE utf8_general_ci
			";
			if ($this->connection->query($statement)) {
				$statement = "INSERT INTO `settings` (title) VALUES (?)";
				$this->connection->prepare($statement)->execute([settings::TITLE]);
			}
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
		
		private function checkDatabase() : bool {
			$stmt = $this->connection->query("SELECT `DEFAULT_COLLATION_NAME` FROM `information_schema`.`SCHEMATA` WHERE `SCHEMA_NAME`='$this->db'");
			return (bool) $stmt->fetchColumn();
		}
		
		private function selectDatabase() : void {
			$this->connection->query("use ".$this->db);
		}
		
		private function createDatabase() : void {
			$this->connection->exec("CREATE DATABASE `$this->db`;
                CREATE USER '$this->user'@'$this->host' IDENTIFIED BY '$this->pass';
                GRANT ALL ON `$this->db`.* TO '$this->user'@'$this->host';
                FLUSH PRIVILEGES;");
		}
	}
	
?>