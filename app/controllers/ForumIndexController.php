<?php
	namespace app\controllers;
	
	use app\config\settings as settings;
	use PDO;
	
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
					include dirname(__DIR__).'/views/ForumIndex.php';
					break;
				default :
					$stmt = $this->db->connection->query("SELECT * FROM `categories`");
					$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
					$stmt = $this->db->connection->query("SELECT * FROM `subcategories`");
					$subcategories = $stmt->fetchAll(PDO::FETCH_ASSOC);
					include dirname(__DIR__).'/views/ForumIndex.php';
					break;
			}
		}
	}
?>