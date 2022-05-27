<?php
	namespace app\modules;
	use app\controllers\database;
	class forum {
		private string $title;
		private database $db;
		
		public function __construct() {
			$this->title = $this->getTitle();
			$this->db = new database();
		}
		
		private function getTitle() : string {
			//$this->db->con 
			return true;
		}
	}
?>