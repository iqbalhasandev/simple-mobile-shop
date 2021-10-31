<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	require_once('User.php');
	require_once('Mobile.php');
	require_once('DataBase.php');
	session_start();
	$AdminID="";
	$admin = NULL;
	$mobiles = NULL;
	$brands = NULL;
	if(isset($_SESSION['AdminID']) && !empty($_SESSION['AdminID'])) {
		$UserID=$_SESSION['AdminID'];
		$DB = new DataBase();
		$admin = $DB->getAdminById($UserID);
		$mobiles = $DB->getMobilesAsend();
		$brands = $DB->getBrands();
		if($brands == 0 || $brands == "error" || sizeof($brands) == 0){
			$brands = NULL;
		}
		if($mobiles == 0 || $mobiles == "error" || sizeof($mobiles)==0){
			$mobiles = NULL;
		}
	}else{
		header('Location: LoginAsAdmin.php');
	}
?>

<html>
	<head>
		<title>Admin Page</title>
		<link rel="stylesheet" href="bootstrap-theme.css">
		<link rel="stylesheet" href="bootstrap-theme.min.css">
		<link rel="stylesheet" href="bootstrap.css">
		<link rel="stylesheet" href="bootstrap.min.css">
	</head>
	<body>
		<form class="form-horizontal" action="AddBrand.php" method="post" enctype="multipart/form-data">
			<fieldset>
			
			<!-- Form Name -->
			<legend>Add Brand</legend>
			
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" >Name</label>  
			  <div class="col-md-4">
			  <input name="name" type="text" placeholder="Name" class="form-control input-md" required="">
			    
			  </div>
			</div>
			
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" >Image</label>  
			  <div class="col-md-4">
			 	 <input id="brandImage" name="brandImage" accept="image/*" type="file" class="form-control" required="">
			  </div>
			</div>
			
			<!-- Button (Double) -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="anmelden"></label>
			  <div class="col-md-8">
			    <input type="submit" value="Add" name="submit" class="btn btn-success">
			  </div>
			</div>
			
			</fieldset>
		</form>
		
		<form class="form-horizontal" action="AddMobile.php" method="post" enctype="multipart/form-data">
			<fieldset>
			
			<!-- Form Name -->
			<legend>Add Mobile</legend>
			
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="name">Model</label>  
			  <div class="col-md-4">
			 	 <input name="model" type="text" placeholder="Model" class="form-control input-md" required="">
		      </div>
			</div>
			
              <div class="form-group">
	              <label class="col-md-4 control-label" for="name">Brand</label>  
				  <div class="col-md-4">
				  	<select name="brand" class="form-control">
					  	<?php 
					  		foreach ($brands as $b){
					  			echo "<option value='$b->ID'>$b->Name</option>";
					  		}
					  	?>
			  		</select>
			      </div>
              </div>
           	<br/>
			
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label">Price</label>  
			  <div class="col-md-4">
			 	 <input name="price" type="text" placeholder="Price" class="form-control input-md" required="">
			  </div>
			</div>
			
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" >Release Date</label>  
			  <div class="col-md-6">
			  	<input name="date" type="date" class="form-control  required="">
			  </div>
			</div>
			
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" >Discount Rate</label>  
			  <div class="col-md-6">
			  	<input name="discount" type="text" placeholder="Discount Rate" class="form-control input-md" required="">
			  </div>
			</div>
			
			<div class="form-group">
			  <label class="col-md-4 control-label" >Image</label>  
			  <div class="col-md-4">
			 	 <input id="imageUpload" name="imageUpload" type="file" class="form-control" required="">
			  </div>
			</div>
			
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" >Camera Specs</label>  
			  <div class="col-md-6">
			  	<input name="camera" type="text" placeholder="Camera Specs" class="form-control input-md" required="">
			  </div>
			</div>
			
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" >Memory Specs</label>  
			  <div class="col-md-6">
			  	<input name="memory" type="text" placeholder="Memory Specs" class="form-control input-md" required="">
			  </div>
			</div>
			
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" >Network Specs</label>  
			  <div class="col-md-6">
			  	<input name="network" type="text" placeholder="Network Specs" class="form-control input-md" required="">
			  </div>
			</div>
			
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label">Platform</label>  
			  <div class="col-md-6">
			  	<input name="platform" type="text" placeholder="Platform" class="form-control input-md" required="">
			  </div>
			</div>
			
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" >CPU</label>  
			  <div class="col-md-6">
			  	<input name="cpu" type="text" placeholder="CPU" class="form-control input-md" required="">
			  </div>
			</div>
			
			<!-- Textarea -->
			<div class="form-group">
			  <label class="col-md-4 control-label" >Features</label>
			  <div class="col-md-4">                     
			    <input type="text" name="features" class="form-control input-md" required=""> 
			  </div>
			</div>
			
			<!-- Button (Double) -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="anmelden"></label>
			  <div class="col-md-8">
			    <input type="submit" value="Add" class="btn btn-success">
			  </div>
			</div>
			</fieldset>
		</form>
		
		<hr>
		
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="my-list">
						<div class="detail">
							<?php 
								if($mobiles != NULL){
									foreach ($mobiles as $mobile){
										echo "
												<form action='EditMobile.php' method='post'>
													<img src='".$mobile->ImageUrl."' alt='dsadas' />
													<p style='float: right;'>".$mobile->Price." : ".$DB->getBrandById($mobile->BrandID)->Name." | ".$mobile->Model." </p>
													<input type='hidden' value='".$mobile->ID."' name='ID' id='ID' >
													<input type='submit' value='Edit' class='btn btn-info'>
												</form>
											";
									}
								}
							?>
						</div>
					</div>
				</div>
			</div>
    	</div>
		<a href="logout.php" class="btn btn-success">Sign Out</a>
	</body>
</html>