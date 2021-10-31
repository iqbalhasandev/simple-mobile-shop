<?php
error_reporting(E_ALL ^ E_DEPRECATED);
require_once('Brand.php');
require_once('DataBase.php');
session_start();
if ((isset($_SESSION['AdminID']) && !empty($_SESSION['AdminID'])) && (isset($_POST['name'])
	&& !empty($_POST['name'])) && (isset($_FILES['brandImage'])
	&& !empty($_FILES['brandImage']))) {
	$brandName = $_POST['name'];
	$FileName = $_FILES['brandImage']['name'];
	$tmp_name = $_FILES['brandImage']['tmp_name'];

	$location = "img/BrandsPictures/";

	if (move_uploaded_file($tmp_name, $location . $brandName . ".jpg")) {
		$ImageURL = $location . $brandName . ".jpg";
		$DB = new Database();
		$brand = new Brand(0, $brandName, $ImageURL);
		$DB->addBrand($brand);
		header('Location: AdminPage.php');
	}
} else {
	header('Location: AdminPage.php');
}
