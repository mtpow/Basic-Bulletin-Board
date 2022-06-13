<?php
	namespace app\modules;

	class error {
		public static string $error;
		
		public function __construct(string $error) {
			self::$error = $error;
			include dirname(__DIR__).'\views\error.php';
			self::redirect(self::$error);
		}
		
		public static function redirect(string $error) : void {
			$redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
			echo '<meta http-equiv="refresh" content="5;url='.$redirect.'">';
		}
	}
?>