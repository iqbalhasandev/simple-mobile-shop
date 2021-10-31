<?php
error_reporting(E_ALL ^ E_DEPRECATED);
require_once('User.php');
require_once('DataBase.php');
if ((isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password']) && isset($_POST['password']) && isset($_POST['password']) && isset($_POST['password']))
	&& (!empty($_POST['email']) && !empty($_POST['password'])) && !empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['username']) && !empty($_POST['confirm'])
) {
	$Email = ($_POST['email']);
	$Password = ($_POST['password']);
	$FirstName = ($_POST['firstName']);
	$Lastname = ($_POST['lastName']);
	$Username = ($_POST['username']);
	$Confirm = ($_POST['confirm']);

	if ($Confirm != $Password) {
		header("Location: Register.html");
	} else {
		$DB = new Database();
		$user = new User(0, $FirstName, $Lastname, "img/UserProfiles/DefaultUser.jpg", $Email, $Username, $Password);
		$validate = $DB->registerUser($user);
		switch ($validate) {
			case "error":
				header('Location: Register.php');
				break;
			case "exist":
				header('Location: Register.php');
				break;
			case "valid":
				session_start();
				$_SESSION["UserID"] = $DB->loginAsUser($Email, $Password);
				header('Location: Home.php');
				break;
		}
	}
} else {/*
		header('Location: Register.html');*/
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="register.css">
	<link rel="stylesheet" href="asset/css/bootstrap-theme.css">
	<link rel="stylesheet" href="asset/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="asset/css/bootstrap.css">
	<link rel="stylesheet" href="asset/css/bootstrap.min.css">
	<!-- Website Font style -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

	<title>Register</title>
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

	<br />

	<div class="container">
		<div class="row main">
			<div class="panel-heading">
			</div>
			<div class="main-login main-center">
				<form class="form-horizontal" method="post" action="Register.php">

					<div class="form-group">
						<label for="name" class="cols-sm-2 control-label">First Name</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="firstName" placeholder="Enter your Name" required />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="name" class="cols-sm-2 control-label">Last Name</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="lastName" placeholder="Enter your Name" required />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="email" class="cols-sm-2 control-label">Your Email</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
								<input type="email" class="form-control" name="email" id="email" placeholder="Enter your Email" required />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="username" class="cols-sm-2 control-label">Username</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="username" placeholder="Enter your Username" required />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="password" class="cols-sm-2 control-label">Password</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
								<input type="password" class="form-control" name="password" placeholder="Enter your Password" required />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
								<input type="password" class="form-control" name="confirm" placeholder="Confirm your Password" required />
							</div>
						</div>
					</div>

					<div class="form-group ">
						<input type="submit" class="btn btn-primary btn-lg btn-block login-button" value="Register">
					</div>
					<div class="login-register">
						<a href="Login.html">Login</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
</body>

</html>