<?php 

	//Start the Session

	session_start();
	//Create constants to store non repeating Values
	define('SITEURL','http://localhost/food-order/');
	define('LOCALHOST', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'food-order');




//Execute Query and Save Data into Database
		//Db Connection
		$conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());
		$db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error());
		

?>