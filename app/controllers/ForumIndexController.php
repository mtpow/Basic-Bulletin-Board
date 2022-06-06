<?php
	namespace app\controllers;
	use app\config\settings as settings;
	
	class ForumIndexController extends BaseController {
		
		public function __construct(array $params) {
			parent::__construct();
			$this->getPage($params);
		}
		
		private function getPage(array $params) : void {
			switch($params[0]) {
				case 'login' :
					include dirname(__DIR__).'/views/Login.php';
					break;
				case 'register' :
					include dirname(__DIR__).'/views/Register.php';
					break;
				default :
					include dirname(__DIR__).'/views/ForumIndex.php';
					break;
			}
		}
	}
?>