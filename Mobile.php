<?php
	class Mobile{
		public $ID;
		public $Model;
		public $BrandID;
		public $Price;
		public $ReleaseDate;
		public $DiscountRate;
		public $ImageUrl;
		
		//specs
		public $CameraSpecs;
		public $MemorySpecs;
		public $NetworkSpecs;
		public $Platform;
		public $CPU;
		public $Features;
		
		function __construct($id, $model, $brandID, $price, $releaseDate, $discountRate,
				$imageUrl, $cameraSpecs, $memorySpecs, $networkSpecs, $platform, $cpu, $features){
			$this->ID = $id;
			$this->Model = $model;
			$this->BrandID = $brandID;
			$this->Price = $price;
			$this->ReleaseDate = $releaseDate;
			$this->DiscountRate = $discountRate;
			$this->ImageUrl = $imageUrl;
			$this->CameraSpecs = $cameraSpecs;
			$this->MemorySpecs = $memorySpecs;
			$this->NetworkSpecs = $networkSpecs;
			$this->Platform = $platform;
			$this->CPU = $cpu;
			$this->Features = $features;
		}
	}
?>