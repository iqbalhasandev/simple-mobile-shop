<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	require_once('User.php');
	require_once('DataBase.php');
	session_start();
	$mobile = NULL;
	$DB = NULL;
	if((isset($_SESSION['UserID']) && !empty($_SESSION['UserID'])) && (isset($_POST['id']) && !empty($_POST['id']))){
		$DB = new Database();
		$mobile = $DB->getMobileById($_POST['id']);
	}else {
		header('Location: MobilesList.php');
	}
?>


<html>
	<head>
		<link rel="stylesheet" type="text/css" href="Details.css">
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
		            <li><a href="AboutUS.html">About</a></li>
		            <li><a href="ContactUS.html">Contact</a></li>
		            <li>
		              <a class="btn btn-default btn-outline btn-circle"  data-toggle="collapse" href="logout.php" aria-expanded="false" aria-controls="nav-collapse4">Sign Out <i class=""></i> </a>
		            </li>
		          </ul>
		          <ul class="collapse nav navbar-nav nav-collapse" role="search" id="nav-collapse4">
		            <li><a href="#">Support</a></li>
		            <li class="dropdown">
		              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><img class="img-circle" src="https://pbs.twimg.com/profile_images/588909533428322304/Gxuyp46N.jpg" alt="maridlcrmn" width="20" /> Maridlcrmn <span class="caret"></span></a>
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
		   <div class="col-xs-4 item-photo">
		                    <img style="max-width:100%;" src="<?php echo $mobile->ImageUrl?>" />
		                </div>                             
						<img style="max-width:100%;" src="<?php echo $DB->getBrandById($mobile->BrandID)->ImageUrl?>" />
		                <div class="col-xs-9">
		                    <ul class="menu-items">
		                        <li class="active">Mobile Details</li>
		                    </ul>
		                    <div style="width:100%;border-top:1px solid silver">
		                        <p style="padding:15px;">
		                            <small><?php echo $mobile->Features?></small>
		                        </p>
		                        <small>
		                        <ul>
		                            <li>Brand:   <?php echo $DB->getBrandById($mobile->BrandID)->Name?></li>
		                            <li>Model:   <?php echo $mobile->Model?></li>
		                            <li>Price:   <?php echo $mobile->Price-($mobile->Price*$mobile->DiscountRate)/$mobile->Price." EGP"?></li>
		                            <li>Release Date:   <?php echo $mobile->ReleaseDate?>y</li>
		                            <li>Discount Rate:   <?php echo $mobile->DiscountRate?></li>
		                            <li>Camera Specs:   <?php echo $mobile->CameraSpecs?></li>
		                            <li>Memory Specs:   <?php echo $mobile->MemorySpecs?></li>
		                            <li>Network Specs:   <?php echo $mobile->NetworkSpecs?></li>
		                            <li>Platform:   <?php echo $mobile->Platform?></li>
		                            <li>CPU:   <?php echo $mobile->CPU?></li>
		                        </ul>  
		                        </small>
		                    </div>
		                </div>		
			</div>
		</div>
	</body>
</html>