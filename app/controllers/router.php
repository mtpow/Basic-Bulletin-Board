<?php
	namespace app\controllers;
	
	use PDO;
	use app\config\settings as settings;
	
	class router {
		
		private string $method;
		private string $uri;
		private array $path;
		private string $controller;
		private array $params;
		
		public function __construct(string $uri, string $method) {
			$this->method = strtolower($method);
			$this->path = $this->getPath($uri);
			$this->controller = $this->getController();
			$this->params = $this->getParams();
			$this->route();
		}
		
		private function getPath(string $path) : array {
			$path = strtolower($path);
			$path = explode('/', $path);
			$path = array_filter($path);
			$path = array_values($path);
			return $path;
		}
		
		private function getController() : string {
			$controller = 'default';
			if (isset($this->path[0])) {
					$controller = $this->path[0];
					unset($this->path[0]);
			}
			return $controller;
		}
		
		private function getParams() : array {
			$params = array();
			if (is_array($this->path)) {
				foreach($this->path as $param) {
					$params[] = $param;
				}
			}
			return $params;
		}
		
		private function route() : void {

		}
	}