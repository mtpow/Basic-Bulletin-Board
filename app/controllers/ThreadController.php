<?php
	namespace app\controllers;
	use app\modules\error;
	use PDO;
	
	class ThreadController extends BaseController {
		
		public function __construct(array $params) {
			parent::__construct();
			$this->getPage($params);
		}
		
		private function getPage(array $params) : void {
			var_dump($params);
			$subcat_id = $params[0];
			$statement = $this->db->connection->query("SELECT * FROM `threads` WHERE `subcat_id` = '$subcat_id'");
			$threads = $statement->fetchAll(PDO::FETCH_ASSOC);
			var_dump($threads);
			include dirname(__DIR__).'/views/Threads.php';
		}
		
	}
?>