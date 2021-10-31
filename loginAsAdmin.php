<?php 
	error_reporting(E_ALL ^ E_DEPRECATED);
	require_once('User.php');
	require_once('DataBase.php');
	if((isset($_POST['email'])&& isset($_POST['password'])) && (!empty($_POST['email'])&& !empty($_POST['password']))){
		$Email =($_POST['email']);
		$Password =($_POST['password']);
		$DB = new Database();
		$validation = $DB->loginAsAdmin($Email, $Password);
		if($validation == "error"){
			header('Location: LoginAsAdmin.php');
		}elseif ($validation == "invalid"){
			header('Location: LoginAsAdmin.php');
		}else{
			session_start();
			$_SESSION["AdminID"] = $validation;
			header('Location: AdminPage.php');
		}
	}else {
	/*	header('Location: LoginAsAdmin.html');*/

	}
?>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="login.css">
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
		            <li><a href="AboutUs.php">About</a></li>
		            <li><a href="ContactUs.php">Contact</a></li>
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
		
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		
		<div class="container">
		    <div class="row">
		    	<div class="col-md-4 col-md-offset-4">
		    		<div class="panel panel-default">
					  	<div class="panel-heading">
					    	<h3 class="panel-title">Login as Admin</h3>
					 	</div>
					  	<div class="panel-body">
					    	<form accept-charset="UTF-8" role="form" action="LoginAsAdmin.php" method="post">
			                    <fieldset>
						    	  	<div class="form-group">
						    		    <input class="form-control" placeholder="yourmail@example.com" name="email" type="text" required>
						    		</div>
						    		<div class="form-group">
						    			<input class="form-control" placeholder="Password" name="password" type="password" value="" required>
						    		</div>
						    		<div class="checkbox">
						    	    	<label>
						    	    		<input name="remember" type="checkbox" value="Remember Me"> Remember Me
						    	    	</label>
						    	    </div>
						    		<input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
						    	</fieldset>
					      	</form>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>