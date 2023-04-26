<?php
	session_start();
	class IndexCommand implements Command {
	   
		public function execute() {
			require_once 'application/template/default.php';
		}

	}

?>