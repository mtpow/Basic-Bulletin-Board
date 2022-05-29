<?php
	namespace app\controllers;
	
	use app\modules\user;
	use app\modules\forum;
	
	class ForumIndexController {
		
		private string $method;
		private string $page;
		private array $params;
		
		private forum $forum;
		private user $user;
		
		public function __construct(string $method, array $params) {
			$this->method = $method;
			$this->params = $params;
			
			$this->forum = new forum();
			$this->user = new user();
			
			switch($this->method) {
				case 'get' :
					$this->getIndex();
					break;
				case 'post' :
					if (isset($_POST['register'])) {
						$this->register();
						break;
					}
					if (isset($_POST['login'])) {
						$this->login();
						break;
					}
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