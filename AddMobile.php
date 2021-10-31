<?php
error_reporting(E_ALL ^ E_DEPRECATED);
require_once('Brand.php');
require_once('DataBase.php');
session_start();
if ((isset($_SESSION['AdminID']) && !empty($_SESSION['AdminID']))) {

	$model = $_POST['model'];
	$brand = $_POST['brand'];
	$price = $_POST['price'];
	$date = $_POST['date'];
	$discount = $_POST['discount'];
	$tmp_name = $_FILES['imageUpload']['tmp_name'];
	$camera = $_POST['camera'];
	$memory = $_POST['memory'];
	$network = $_POST['network'];
	$platform = $_POST['platform'];
	$cpu = $_POST['cpu'];
	$features = $_POST['features'];


	$location = "img/MobilesPictures/";

	if (move_uploaded_file($tmp_name, $location . $brand . $model . ".jpg")) {
		$ImageURL = $location . $brand . $model . ".jpg";
		$DB = new Database();
		$mobile = new Mobile(0, $model, $brand, $price, $date, $discount, $ImageURL, $camera, $memory, $network, $platform, $cpu, $features);
		$DB->addMobile($mobile);
		header('Location: AdminPage.php');
	}
	header('Location: AdminPage.php');
} else {
	header('Location: AdminPage.php');
}
