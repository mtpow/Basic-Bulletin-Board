<?php
	namespace app\controllers;
	use app\modules\user;
	use app\modules\forum;
	
	class index {
		
		private string $method;
		private string $page;
		private array $params;
		private object $forum;
		private object $user;
		
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
					$this->login();
					break;
			}
		}
		
		private function getIndex() : void {
			include dirname(__DIR__).'/views/forum_index.php';
		}
		
		private function getPage() : void {
		}
	}
?>