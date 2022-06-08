<?php
	namespace app\controllers;

	class router {
		private string $controller;
		private array $path;
		private array $params;
		
		public function __construct() {
			$this->params = $this->getParams($_SERVER['REQUEST_URI']);
			$this->route();
		}
		
		private function getParams(string $path) : array {
			$path = strtolower($path);
			$path = explode('/', $path);
			$path = array_values(array_filter($path));
			$path[0] = empty($path[0]) ? '/' : $path[0];
			$this->controller = $path[0];
			return $path;
		}
		
		private function route() : void {
			switch($this->controller) {
				default :
					$controller = new ForumIndexController($this->params);
			}
		}
	}