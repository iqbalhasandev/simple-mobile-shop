<?php 
	class Admin{
		public $ID;
		public $Username;
		public $Password;
		public $Email;
		
		function __construct($_id, $_username, $_password, $_email){
			$this->ID = $_id;
			$this->Username = $_username;
			$this->Password = $_password;
			$this->Email = $_email;
		}
	}
?>