<?php
	namespace app\controllers;
	USE pdo;
	
	class UserController extends BaseController {
		public function __construct(array $params) {
			parent::__construct();
			$this->getPage($params);
		}
		
		private function getPage(array $params) : void {
			$user = $this->db->connection->query("SELECT * FROM `users` WHERE `username` = '$params[1]'")->fetch(PDO::FETCH_ASSOC);
			$statement = $this->db->connection->query("SELECT posts.id, posts.author, posts.text, posts.date, posts.thread_id, users.avatar FROM `posts` LEFT JOIN `users` ON posts.author = users.username ORDER BY posts.id DESC");
			$posts = $statement->fetchAll(PDO::FETCH_ASSOC);
			include dirname(__DIR__).'/views/User.php';
		}
	}
?>