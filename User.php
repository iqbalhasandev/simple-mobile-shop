<?php 
	class User{
		public $ID;
		public $FirstName;
		public $LastName;
		public $ImageURL;
		public $EMail;
		public $Username;
		public $Password;
		
		public function __construct($_id ,$_firstName , $_lastName , $_imageUrl , $_mail , $_username , $_password){
			$this->ID = $_id;
			$this->FirstName = $_firstName;
			$this->LastName = $_lastName;
			$this->ImageURL = $_imageUrl;
			$this->EMail = $_mail;
			$this->Username = $_username;
			$this->Password = $_password;
			$this->ListOfFriends = array();
		}
	}
?>