<?php
	session_start();
	unset($_SESSION["UserID"]);
	unset($_SESSION["AdminID"]);
	header('Location: Home.php');
?>