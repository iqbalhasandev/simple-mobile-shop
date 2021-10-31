<?php 
	require_once('User.php');
	require_once('Mobile.php');
	require_once('Admin.php');
	require_once('Brand.php');
	class Database{
		private $db_host;
		private $db_user;
		private $db_pass;
		private $db_name;
		function __construct(){
			//init
			$this->db_host = 'localhost';
			$this->db_user = 'root';
			$this->db_pass = '';
			$this->db_name = 'mobileshop';
		}
		
		function loginAsUser($email,$password){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;     
			}
			$sql = "SELECT * FROM `user` WHERE email='$email' AND password='$password'";
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$ID = $row["id"];
					$conn->close();
					return $ID;
				}
			}else{
				$conn->close();
				return "invalid";
			}
		}
		
		function loginAsAdmin($email,$password){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;
			}
			$sql = "SELECT * FROM `admin` WHERE email='$email' AND password='$password'";
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$ID = $row["id"];
					$conn->close();
					return $ID;
				}
			}else{
				$conn->close();
				return "invalid";
			}
		}
		
		function registerUser(User $User){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;
			}
			$FirstName = $User->FirstName;
			$LastName = $User->LastName;
			$ImageUrl = $User->ImageURL;
			$Email = $User->EMail;
			$Username = $User->Username;
			$Password = $User->Password;
			
			$sql = "SELECT * FROM `user` WHERE email='$Email'";
			$result = $conn->query($sql);
			//if there are one or more results then user exists
			if ($result->num_rows > 0) {
				$conn->close();
				return "exist";
			}else{
				$sql = "INSERT INTO user (firstName,lastName,imageUrl,email,username,password)
				VALUES ('$FirstName','$LastName','$ImageUrl','$Email','$Username','$Password')";
				if($conn->query($sql)){
					$conn->close();
					return "valid";
				}else{
					$conn->close();
					return "error";
				}
			}
		}
		
		function getUserById($id){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;
			}
			$sql = "SELECT * FROM `user` WHERE id='$id'";
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$ID = $row["id"];
					$FirstName = $row["firstName"];
					$LastName = $row["lastName"];
					$ImageURL = $row["imageUrl"];
					$Email = $row["email"];
					$Username = $row["username"];
					$Password = $row["password"];
					$user = new User($ID, $FirstName, $LastName, $ImageURL, $Email, $Username, $Password);
					$conn->close();
					return $user;
				}
			}else{
				$conn->close();
				return "invalid";
			}
		}		
		
		function getAdminById($id){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;
			}
			$sql = "SELECT * FROM `admin` WHERE id='$id'";
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$ID = $row["id"];
					$Username = $row["username"];
					$Password = $row["password"];
					$Email = $row["email"];
					$admin = new Admin($ID, $Password, $Username, $Email);
					$conn->close();
					return $admin;
				}
			}else{
				$conn->close();
				return "invalid";
			}
		}
		
// 		function getBrandById($id){
// 			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
// 			if (mysqli_connect_errno()){
// 				return "error" ;
// 			}
// 			$sql = "SELECT * FROM `brand` WHERE id='$id'";
// 			$result = $conn->query($sql);
// 			if($result->num_rows > 0){
// 				while($row = $result->fetch_assoc()){
// 					$id = $row["id"];
// 					$name = $row["name"];
// 					$imageUrl = $row["imageUrl"];
// 					$brand = new Brand($id, $name, $imageUrl);
// 					$conn->close();
// 					return $brand;
// 				}
// 			}else{
// 				$conn->close();
// 				return "invalid";
// 			}
// 		}
		
		function editMobile(Mobile $mobile){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;
			}
			
			$id = $mobile->ID;
			$model = $mobile->Model;
			$brandID = $mobile->BrandID;
			$price = $mobile->Price;
			$releaseDate = $mobile->ReleaseDate;
			$discountRate = $mobile->DiscountRate;
			$imageUrl = $mobile->ImageUrl;
			$cameraSpecs = $mobile->CameraSpecs;
			$memorySpecs = $mobile->MemorySpecs;
			$networkSpecs = $mobile->NetworkSpecs;
			$platform = $mobile->Platform;
			$cpu = $mobile->CPU;
			$features = $mobile->Features;
			
			$sql = "UPDATE mobile SET model='$model',brandID='$brandID',price='$price',releaseDate='$releaseDate',
			discountRate='$discountRate',mobileUrl='$imageUrl',cameraSpecs='$cameraSpecs',memorySpecs='$memorySpecs',
			networkSpecs='$networkSpecs',platform='$platform',cpu='$cpu',features='$features' WHERE id=$id";
			if($conn->query($sql)){
				$conn->close();
				return "valid";
			}else{
				$conn->close();
				return "error";
			}
		}
		
		function addBrand(Brand $brand){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;
			}
			$name = $brand->Name;
			$image = $brand->ImageUrl;
			$sql = "INSERT INTO brand (name,imageUrl) VALUES ('$name','$image')";
			if($conn->query($sql)){
				$conn->close();
				return "valid";
			}else{
				$conn->close();
				return "error";
			}
		}
		
		function getBrands(){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;
			}
			$sql = "SELECT * FROM `brand`";
			$brands = array();
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$ID = $row["id"];
					$Name = $row["name"];
					$ImageUrl = $row["imageUrl"];
					$brand = new Brand($ID, $Name,$ImageUrl);
					array_push($brands,$brand);
				}
				return $brands;
			}
			return 0;
		}
		
		function getBrandById($id){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;
			}
			$sql = "SELECT * FROM `brand` WHERE id='$id'";
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$ID = $row["id"];
					$Name = $row["name"];
					$ImageUrl = $row["imageUrl"];
					$brand = new Brand($ID, $Name,$ImageUrl);
				}
				return $brand;
			}
			return 0;
		}
		
		function addMobile(Mobile $mobile){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;
			}
			$id = $mobile->ID;
			$model = $mobile->Model;
			$brandID = $mobile->BrandID;
			$price = $mobile->Price;
			$releaseDate = $mobile->ReleaseDate;
			$discountRate = $mobile->DiscountRate;
			$imageUrl = $mobile->ImageUrl;
			$cameraSpecs = $mobile->CameraSpecs;
			$memorySpecs = $mobile->MemorySpecs;
			$networkSpecs = $mobile->NetworkSpecs;
			$platform = $mobile->Platform;
			$cpu = $mobile->CPU;
			$features = $mobile->Features;
			
			$sql = "INSERT INTO mobile (model,brandID,price,releaseDate,discountRate,mobileUrl,cameraSpecs,memorySpecs,networkSpecs,platform,cpu,features)
				VALUES ('$model','$brandID','$price','$releaseDate','$discountRate','$imageUrl','$cameraSpecs','$memorySpecs','$networkSpecs','$platform','$cpu','$features')";
			
			if($conn->query($sql)){
				$conn->close();
				return "valid";
			}else{
				$conn->close();
				return "error";
			}
		}
		
		
		
		function getMobileById($id){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;
			}
			$sql = "SELECT * FROM `mobile` WHERE id='$id'";
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$ID = $row["id"];
					$model = $row["model"];
					$brandID = $row["brandID"];
					$price = $row["price"];
					$releaseDate = $row["releaseDate"];
					$discountRate = $row["discountRate"];
					$imageUrl = $row["mobileUrl"];
					$cameraSpecs = $row["cameraSpecs"];
					$memorySpecs = $row["memorySpecs"];
					$networkSpecs = $row["networkSpecs"];
					$platform = $row["platform"];
					$cpu = $row["cpu"];
					$features = $row["features"];
					$mobile = new Mobile($ID, $model, $brandID, $price, $releaseDate, $discountRate, $imageUrl,
							$cameraSpecs, $memorySpecs, $networkSpecs, $platform, $cpu, $features);
				}
				return $mobile;
			}
			return 0;
		}
		
		function getMobilesAsend(){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;
			}
			$sql = "SELECT * FROM `mobile`";
			$Mobiles = array();
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$ID = $row["id"];
					$model = $row["model"];
					$brandID = $row["brandID"];
					$price = $row["price"];
					$releaseDate = $row["releaseDate"];
					$discountRate = $row["discountRate"];
					$imageUrl = $row["mobileUrl"];
					$cameraSpecs = $row["cameraSpecs"];
					$memorySpecs = $row["memorySpecs"];
					$networkSpecs = $row["networkSpecs"];
					$platform = $row["platform"];
					$cpu = $row["cpu"];
					$features = $row["features"];
					
					$mobile = new Mobile($ID, $model, $brandID, $price, $releaseDate, $discountRate, $imageUrl,
							$cameraSpecs, $memorySpecs, $networkSpecs, $platform, $cpu, $features);
					
					array_push($Mobiles,$mobile);
				}
				return $Mobiles;
			}
			return 0;
		}
		
	}
?>