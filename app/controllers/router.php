<?php
	namespace app\controllers;

	class router {
		private string $controller;
		private array $params;
		
		public function __construct(string $path) {
			$this->params = explode('/', strtolower($path));
			$this->params = array_values(array_filter($this->params));
			$this->params[0] = empty($this->params[0]) ? '/' : $this->params[0]; //hack
			$this->controller = $this->params[0];
			unset($this->params[0]);
			$this->params = array_values($this->params);
			$this->route($this->controller, $this->params);
		}
		
		private function route(string $controller, array $params) : void {
			switch($controller) {
				default :
					$controller = new ForumIndexController($params);
					break;
				case 'category' :
					$controller = new ThreadController($params);
					break;
			}
		}
	}