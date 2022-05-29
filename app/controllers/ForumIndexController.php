<?php
	namespace app\controllers;
	
	use app\modules\user;
	use app\modules\forum;
	use app\modules\error;
	use app\config\settings as settings;
	
	class ForumIndexController {
		
		private string $method;
		private string $page;
		
		private array $params;
		private array $errors;
		
		private forum $forum;
		private user $user;
		
		public function __construct(string $method, array $params) {
			$this->method = $method;
			$this->params = $params;
			$this->errors = array();
			//var_dump(settings);
			$this->forum = new forum();
			$this->user = new user();
			
			$this->getPage();
		}
		
		private function getPage() : void {
			if ($this->method == 'get')
				$this->getIndex();
				
			if ($this->method == 'post') {
				if (empty($_POST['user'])) {
					$error = new error('Please input a username');
					return;
				}
				if (empty($_POST['pass'])) {
					$error = new error('Please input a password');
					return;
				}
				
				if (isset($_POST['register']))
					$this->register();
					
				if (isset($_POST['login']))
					$this->login();
			}
		}
		
		private function getIndex() : void {
			include dirname(__DIR__).'/views/forum_index.php';
		}
		
		private function login() : void {
			echo 'login';
		}
		
		private function register() : void {
			echo 'register';
		}
	}
?>