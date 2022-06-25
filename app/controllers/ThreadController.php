<?php
	namespace app\controllers;
	use PDO;
	
	class ThreadController extends BaseController {
		
		public function __construct($params) {
			parent::__construct();
			$this->getPage($params);
		}
		
		private function getPage(array $params) : void {
			$statement = $this->db->connection->query("SELECT posts.id, posts.author, posts.text, posts.date, posts.thread_id, users.avatar FROM `posts` LEFT JOIN `users` ON posts.author = users.username WHERE `thread_id` = '$params[1]'");
			$posts = $statement->fetchAll(PDO::FETCH_ASSOC);
			include dirname(__DIR__).'/views/Posts.php';
		}
	}
?>