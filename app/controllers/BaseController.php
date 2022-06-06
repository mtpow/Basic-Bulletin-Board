<?php
	namespace app\controllers;
	
	use app\config\settings as settings;
	use app\modules\user;
	use app\controllers\database;
	
	class BaseController {
		protected database $db;
		protected user $user;
		protected string $title;
		
		public function __construct() {
			$this->db = database::instance();
			$this->user = new user();
			$this->title = SETTINGS::TITLE;
		}
	}
?>