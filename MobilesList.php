<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	require_once('User.php');
	require_once('DataBase.php');
	require_once('Mobile.php');
	session_start();
	$UserID="";
	$user = null;
	$mobiles = NULL;
	$DB = NULL;
	if(isset($_SESSION['UserID']) && !empty($_SESSION['UserID'])) {
		$UserID=$_SESSION['UserID'];
		$DB = new DataBase();
		$user = $DB->getUserById($UserID);
		$DB = new DataBase();
		$mobiles = $DB->getMobilesAsend();
		if($mobiles == 0 || $mobiles == "error" || sizeof($mobiles)==0){
			$mobiles = NULL;
		}
	}else{
		header('Location: Login.php');
	}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="MobileList.css">
		<link rel="stylesheet" href="bootstrap-theme.css">
		<link rel="stylesheet" href="bootstrap-theme.min.css">
		<link rel="stylesheet" href="bootstrap.css">
		<link rel="stylesheet" href="bootstrap.min.css">
	</head>
	<body>
		<div class="container-fluid">
		    <nav class="navbar navbar-inverse">
		      <div class="container">
		        <!-- Brand and toggle get grouped for better mobile display -->
		        <div class="navbar-header">
		          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-4">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </button>
		          <a class="navbar-brand" href="#">Brands</a>
		        </div>
		    
		        <!-- Collect the nav links, forms, and other content for toggling -->
		        <div class="collapse navbar-collapse" id="navbar-collapse-4">
		          <ul class="nav navbar-nav navbar-right">
		            <li><a href="Home.php">Home</a></li>
		            <li><a href="AboutUS.php">About</a></li>
		            <li><a href="ContactUS.php">Contact</a></li>
		            <li>
		              <a class="btn btn-default btn-outline btn-circle"  data-toggle="collapse" href="logout.php" aria-expanded="false" aria-controls="nav-collapse4">Sign Out <i class=""></i> </a>
		            </li>
		          </ul>
		          <ul class="collapse nav navbar-nav nav-collapse" role="search" id="nav-collapse4">
		            <li><a href="#">Support</a></li>
		            <li class="dropdown">
		              <ul class="dropdown-menu" role="menu">
		                <li><a href="#">My profile</a></li>
		                <li><a href="#">Favorited</a></li>
		                <li><a href="#">Settings</a></li>
		                <li class="divider"></li>
		                <li><a href="#">Logout</a></li>
		              </ul>
		            </li>
		          </ul>
		        </div><!-- /.navbar-collapse -->
		      </div><!-- /.container -->
		    </nav><!-- /.navbar -->
		</div><!-- /.container-fluid -->
	
	
		<div class="container">
			<div class="row">
				<?php 
					if($mobiles != NULL){
						foreach ($mobiles as $mobile){
							echo "
				
									<div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'>
										<div class='my-list'>
											<img src='$mobile->ImageUrl' alt='dsadas' />
											<h3>".$DB->getBrandById($mobile->BrandID)->Name." "."$mobile->Model</h3>
											<span>Platform:</span>
											<span class='pull-right'>$mobile->Platform</span>
											<div class='offer'>$mobile->Price EGP</div>
											<div class='detail'>
												<p>Click 'Details' for more info</p>
												<img src='$mobile->ImageUrl' alt='dsadas' />
												<form action='Details.php' method='post'>
													<input type='hidden' value='$mobile->ID' id='id' name='id'>
													<input type='submit' value='Details' class='btn btn-info'>
												</form>
											</div>
										</div>
									</div>
								";
							}
						}
				?>
				
			</div>
    	</div>
    	
	</body>
</html>