<?php
	namespace app\modules;
	
	class error {
		public string $error;
		
		public function __construct(string $error) {
			$this->error = $error;
			include dirname(__DIR__).'\views\error.php';
			$this->redirect();
		}
		
		public function redirect() : void {
			echo '<meta http-equiv="refresh" content="5;url=index.php">';
		}
	}
?>