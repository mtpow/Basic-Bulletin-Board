<?php
	namespace app\controllers;

	class router {
		private string $controller;
		private array $params;
		
		public function __construct(string $path) {
			$this->params = explode('/', strtolower($path));
			$this->params = array_values(array_filter($this->params));
			$this->controller = $this->getController($this->params);
			$this->route($this->controller, $this->params);
		}
		
		private function route(string $controller, array $params) : void {
			switch($controller) {
				case '/' :
					$controller = new IndexController($params);
					break;
				case 'category' :
					$controller = new CategoryController($params);
					break;
				case 'thread' :
					$controller = new ThreadController($params);
					break;
				case 'user' :
					$controller = new UserController($params);
					break;
			}
		}
		
		private function getController(array $params) : string {
			if (isset($params[0])) {
				if ($params[0] == 'user')
					return 'user';
				if ($params[0] == 'admin')
					return 'admin';
				if ($params[0] == 'edit')
					return 'edit';
				if ($params[0] == 'login')
					return 'login';
				if ($params[0] == 'register')
					return 'register';
			}
			if (isset($params[1]))
				return 'thread';
			if (isset($params[0]))
				return 'category';
			return '/';
		}
	}