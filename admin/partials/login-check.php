<?php
//Authorization
// Check user logged in or not

	if(!isset($_SESSION['user']))  //if user session not set
	{
		//User not logged in
		//Redirect to login page
		$_SESSION['no-login-message'] = "<div class = 'error text-center'>Please login to access Admin Panel.</div>";

		header('location:'.SITEURL.'admin/login.php');


	}

?>