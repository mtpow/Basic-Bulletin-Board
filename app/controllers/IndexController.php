<?php
	namespace app\controllers;
	
	use app\config\settings as settings;
	use PDO;
	
	class IndexController extends BaseController {
		
		public function __construct(array $params) {
			parent::__construct();
			$this->getPage($params);
		}
		
		private function getPage(array $params) : void {
			$statement = $this->db->connection->query("SELECT * FROM `categories`");
			$categories = $statement->fetchAll(PDO::FETCH_ASSOC);
			$statement = $this->db->connection->query("SELECT * FROM `subcategories`");
			$subcategories = $statement->fetchAll(PDO::FETCH_ASSOC);
			include dirname(__DIR__).'/views/Index.php';
		}
	}
?>