<?php
error_reporting(E_ALL ^ E_DEPRECATED);
require_once('User.php');
require_once('DataBase.php');
session_start();
$UserID = "";
$user = null;
if (isset($_SESSION['UserID']) && !empty($_SESSION['UserID'])) {
	$UserID = $_SESSION['UserID'];
	$DB = new DataBase();
	$user = $DB->getUserById($UserID);
} else {
	header('Location: Login.html');
}
?>
<html>
<h1>Welcome <?php echo $user->Username ?></h1>
<img alt="img/UserProfiles/DefaultUser.jpg" src="<?php echo $user->ImageURL ?>" width="150px" height="150px">
<p><?php echo $user->EMail ?></p>

</html>