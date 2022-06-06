<?php
	namespace app\controllers;

	class router {
		private string $controller;
		private array $path;
		private array $params;
		
		public function __construct() {
			$this->path = $this->getPath($_SERVER['REQUEST_URI']);
			$this->controller = $this->getController();
			$this->params = $this->getParams();
			$this->route();
		}
		
		private function getPath(string $path) : array {
			$path = strtolower($path);
			$path = explode('/', $path);
			$path = array_filter($path, function($value) { 
				if ($value != 'app' && $value != 'basic-bulletin-board' && $value != '') {
					return $value;
				}
			});
			$path = array_values($path);
			return $path;
		}
		
		private function getController() : string {
			$controller = 'ForumIndexController';
			if (isset($this->path[0])) {
					$controller = $this->path[0];
					unset($this->path[0]);
					$this->path = array_values($this->path);
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
			if (empty($params))
				$params[0] = '/';
			return $params;
		}
		
		private function route() : void {
			if (class_exists($this->controller)) {
				$controller = new $this->controller($this->params);
			} else {
				$controller = new ForumIndexController($this->params);
			}
		}
	}