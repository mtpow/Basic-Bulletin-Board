<?php
	namespace app\controllers;
	
	use PDO;
	use app\config\settings as settings;
	
	class database {
		
		private pdo $connection;
		private string $db;
		private string $user;
		private string $password;
		private string $host;
		
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
			$this->connection->exec("CREATE DATABASE IF NOT EXISTS `$this->db`;
                CREATE USER IF NOT EXISTS '$this->user'@'$this->host' IDENTIFIED BY '$this->pass';
                GRANT ALL ON `$this->db`.* TO '$this->user'@'$this->host';
                FLUSH PRIVILEGES;");
			$this->connection->query("use ".$this->db);

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