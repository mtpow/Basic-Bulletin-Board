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
		
		private function selectDatabase(string $db) : void {
			 
		}
		
		private function createDatabase($db) : void {
		
		}
	}
	
?>