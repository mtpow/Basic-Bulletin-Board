<?php
	namespace app\controllers;
	use app\modules\error;
	use PDO;
	
	class CategoryController extends BaseController {
		
		public function __construct(array $params) {
			parent::__construct();
			$this->getPage($params);
		}
		
		private function getPage(array $params) : void {
			$statement = $this->db->connection->query("SELECT * FROM `threads` WHERE `subcat_id` = '$params[0]'");
			$threads = $statement->fetchAll(PDO::FETCH_ASSOC);
			include dirname(__DIR__).'/views/Threads.php';
		}
		
	}
?>