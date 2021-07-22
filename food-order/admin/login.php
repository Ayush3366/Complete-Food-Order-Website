
<?php include('../config/constants.php');?>


<!DOCTYPE html>
<html>
<head>
	<title>Login Food Order System</title>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<body>

	<div class="login">
		<h1 class="text-center">Login</h1><br>

		<?php
		if(isset($_SESSION['login']))
		{
			echo $_SESSION['login'];
			unset($_SESSION['login']);
		}

		if(isset($_SESSION['no-login-message']))
		{
			echo $_SESSION['no-login-message'];
			unset($_SESSION['no-login-message']);
		}

		?>

		<br>
		<!-- Login form Starts here -->
		<form action="" method="POST" class="text-center">
		Username:<br><br>
		<input type="text" name="username" placeholder="Enter Username"><br><br>

		Password:<br><br>
		<input type="password" name="password" placeholder="Enter Password"><br><br>

		<input type="submit" name="submit" value="login" class="btn-primary ">
					
		</form>
		<!-- Login form ends here -->
	    <p class="text-center">Created By - <a href="www.Ayushchaudhary.com">Ayush Chaudhary</a></p>
	</div>
</body>
</html>


<?php
	// Check whether the submit button is clicked or not
	if(isset($_POST['submit']))
	{
		// Process for login
		// 1.Get the data from login form
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		//2. Sql to check whether the user with username and password exist or not

		$sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

		// 3.Execute query

		$res = mysqli_query($conn,$sql);

		// 4. Count rows to check whether the user exist or not

		$count = mysqli_num_rows($res);

		if($count == 1){
			// User Available
			$_SESSION['login'] = "<div class='success'>Login Successful.</div>";
			$_SESSION['user'] = $username; //Check whether user logged in or not
			// Redirect

			header('location:'.SITEURL.'admin/');
		}
		else
		{

			$_SESSION['login'] = "<div class='error text-center' >Username or Password did not Matched </div>";
			// Redirect

			header('location:'.SITEURL.'admin/login.php');
		}

	}



?>















