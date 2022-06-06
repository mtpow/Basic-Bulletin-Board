<?php
	namespace app\modules;
	
	class user {
			public string $username;
			public bool $loggedIn;
			public string $avatar;
			public int $messageCount;
			
		public function __construct() {
			$this->loggedIn = $this->loggedIn();
			$this->username = $this->getUsername();
			$this->avatar = $this->getAvatar();
			$this->messageCount = $this->getMessageCount();
		}
		
		private function getUsername() : string {
			if ($this->loggedIn)
				return $_SESSION['username'];
				
			return 'Guest';
		}
		
		private function loggedIn() : bool {
			if (isset($_SESSION['loggedIn']))
				return true;
			
			return false;
		}
		
		private function getAvatar() : string {
			if (isset($_SESSION['avatar']))
				return $_SESSION['avatar'];
			
			return 'default.png';
		}
		
		private function getMessageCount() : int {
			if (isset($_SESSION['messagecount']))
				return $_SESSION['messagecount'];

			return 0;
		}
	}
?>