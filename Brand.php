<?php
	class Brand{
		public $ID;
		public $Name;
		public $ImageUrl;
		
		function __construct($id, $name, $imageUrl) {
			$this->ID = $id;
			$this->Name = $name;
			$this->ImageUrl = $imageUrl;
		}
		
	}
?>