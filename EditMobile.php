<?php
error_reporting(E_ALL ^ E_DEPRECATED);
require_once('User.php');
require_once('DataBase.php');
require_once('Mobile.php');
session_start();
$mobile = null;
$DB = new DataBase();
if (
	(isset($_SESSION['AdminID']) && !empty($_SESSION['AdminID']))
	&& ((!empty($_POST['ID'])) && (isset($_POST['ID'])))
	&& (isset($_FILES['image']) && !empty($_FILES['image']))
	&& (isset($_FILES['features']) && !empty($_FILES['features']))
) {
	$id = $_POST['id'];
	$model = $_POST['model'];
	$brand = $_POST['brand'];
	$price = $_POST['price'];
	$date = $_POST['date'];
	$discount = $_POST['discount'];
	$tmp_name = $_FILES['image']['tmp_name'];
	$camera = $_POST['camera'];
	$memory = $_POST['memory'];
	$network = $_POST['network'];
	$platform = $_POST['platform'];
	$cpu = $_POST['cpu'];
	$features = $_POST['features'];
	$mobile = new Mobile($id, $model, $brand, $price, $date, $discount, $ImageURL, $camera, $memory, $network, $platform, $cpu, $features);

	$location = "img/MobilesPictures/";

	if (move_uploaded_file($tmp_name, $location . $brand . $model . ".jpg")) {
		$ImageURL = $location . $brand . $model . ".jpg";
		$mobile = new Mobile($id, $model, $brand, $price, $date, $discount, $ImageURL, $camera, $memory, $network, $platform, $cpu, $features);
		$DB->editMobile($mobile);
		header('Location: AdminPage.php');
	}
} elseif ((isset($_SESSION['AdminID']) && !empty($_SESSION['AdminID'])) && (isset($_POST['ID']) && !empty($_POST['ID']))) {
	$DB = new DataBase();
	$id = $_POST['ID'];
	$mobile = $DB->getMobileById($id);
} else {
	header('Location: AdminPage.php');
}
?>

<html>

<head>
	<link rel="stylesheet" href="asset/css/bootstrap-theme.css">
	<link rel="stylesheet" href="asset/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="asset/css/bootstrap.css">
	<link rel="stylesheet" href="asset/css/bootstrap.min.css">
</head>

<body>
	<form class="form-horizontal" action="EditMobile.php" method="post">
		<fieldset>
			<!-- Form Name -->
			<legend>Edit Mobile</legend>
			<input type="hidden" value="<?php echo $mobile->ID ?>" name="ID">
			<!-- Text input-->
			<div class="form-group">
				<label class="col-md-4 control-label" for="name">Model</label>
				<div class="col-md-4">
					<input name="model" type="text" placeholder="Model" class="form-control input-md" value="<?php echo $mobile->Model ?>" required="">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 control-label" for="name">Brand</label>
				<div class="col-md-4">
					<select name="brand" class="form-control">
						<option value="<?php echo $mobile->BrandID ?>"><?php echo $DB->getBrandById($mobile->BrandID)->Name; ?></option>
					</select>
				</div>
			</div>
			<br />

			<!-- Text input-->
			<div class="form-group">
				<label class="col-md-4 control-label">Price</label>
				<div class="col-md-4">
					<input name="price" type="text" placeholder="Price" class="form-control input-md" value="<?php echo $mobile->Price ?>" required="">
				</div>
			</div>

			<!-- Text input-->
			<div class="form-group">
				<label class="col-md-4 control-label">Release Date</label>
				<div class="col-md-6">
					<input name="date" type="date" class="form-control required="">
				  </div>
				</div>
				
				<!-- Text input-->
				<div class=" form-group">
					<label class="col-md-4 control-label">Discount Rate</label>
					<div class="col-md-6">
						<input name="discount" type="text" placeholder="Discount Rate" value="<?php echo $mobile->DiscountRate ?>" class="form-control input-md" required="">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Image</label>
					<div class="col-md-4">
						<input name="image" type="file" class="form-control" required="">
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label">Camera Specs</label>
					<div class="col-md-6">
						<input name="camera" type="text" placeholder="Camera Specs" value="<?php echo $mobile->CameraSpecs ?>" class="form-control input-md" required="">
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label">Memory Specs</label>
					<div class="col-md-6">
						<input name="memory" type="text" placeholder="Memory Specs" value="<?php echo $mobile->MemorySpecs ?>" class="form-control input-md" required="">
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label">Network Specs</label>
					<div class="col-md-6">
						<input name="network" type="text" placeholder="Network Specs" value="<?php echo $mobile->NetworkSpecs ?>" class="form-control input-md" required="">
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label">Platform</label>
					<div class="col-md-6">
						<input name="platform" type="text" placeholder="Platform" value="<?php echo $mobile->Platform ?>" class="form-control input-md" required="">
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label">CPU</label>
					<div class="col-md-6">
						<input name="cpu" type="text" placeholder="CPU" value="<?php echo $mobile->CPU ?>" class="form-control input-md" required="">
					</div>
				</div>

				<!-- Textarea -->
				<div class="form-group">
					<label class="col-md-4 control-label">Features</label>
					<div class="col-md-4">
						<textarea class="form-control" id="anschrift" placeholder="Features" name="features" required=""></textarea>
					</div>
				</div>

				<!-- Button (Double) -->
				<div class="form-group">
					<div class="col-md-8">
						<input type="submit" value="Save" class="btn btn-success">
						<a class="btn btn-success" href="AdminPage.php">Back</a>
					</div>
				</div>

		</fieldset>
	</form>
</body>

</html>