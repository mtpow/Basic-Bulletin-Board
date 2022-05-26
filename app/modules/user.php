<?php
	namespace app\modules;
	
	class user {
		private string $name;
		private bool $logged_in;
		
		public function __construct(string $name = 'guest', $logged_in = FALSE) {
			$this->name = $name;
			$this->logged_in = $logged_in;
		}
		
	}
?>