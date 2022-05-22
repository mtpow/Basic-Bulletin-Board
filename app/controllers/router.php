<?php
	namespace app\controllers;
	
	use PDO;
	use app\config\settings as settings;
	use app\controllers\database;
	
	class router {
		
		private string $method;
		private string $uri;
		private array $path;
		
		private $connection;
		
		public function __construct(string $uri, string $method) {
			$database = new database();
			$this->connection = $database->getConnection();
			
			$this->method = strtolower($method);
			$this->uri = strtolower($uri);
			$this->path = explode('/', $this->uri);
			$this->path = array_filter($this->path);
			$this->path = array_values($this->path);
			$this->route();
		}
		
		private function route() : void {
			
		}
	}