<?php include('partials/css.css');?>
<?php include('partials/menu.php');?>

	<div class="main-content">
		<div class="wrapper">
			<h1>Add Admin</h1>
			<br/>
			<br/>
				<?php 
					if(isset($_SESSION['add']))// 
					{
					echo $_SESSION['add'];
					unset($_SESSION['add']);
					}
				?>
			<form action="" method="POST">
				<table class="tbl-30">
					<tr>
						<td>Full Name:</td>
						<td><input type="text" name="full_name" placeholder="Enter Your Name">
						</td>
					</tr>

					<tr>
						<td>User Name:</td>
						<td><input type="text" name="username" placeholder="Enter Your UserName">
						</td>
					</tr>

					<tr>
						<td>Password:</td>
						<td><input type="password" name="password" placeholder="Your Password"></td>
					</tr>

					<tr>
						<td colspan="2">
							<input type="submit" name="submit" value="Add Admin" class="btn-secondary">
						</td>
					</tr>

				</table>
			</form>
		</div>
	</div>
<?php include('partials/footer.php');?>

<?php 
	//Process the Value from form and Save it in database
	//Check whether the submit button is clicked or not

	if(isset($_POST['submit'])){
		//Get the data from form

		$full_name = $_POST['full_name'];
		$username = $_POST['username'];
		$password = md5($_POST['password']); //password Encryption with md5

		// SQL query to save the data into database
		$sql = "INSERT INTO tbl_admin SET
				full_name = '$full_name',
				username = '$username',
				password = '$password'
		";
		//Executing query and saving data into database
		$res = mysqli_query($conn,$sql) or die(mysqli_error());

		//Check whether data is inserted or not and display message

		if($res==TRUE){
			//Create a session variable
			$_SESSION['add'] = "Admin added successfully";
			//Redirect page Manage admin
			header("location:".SITEURL."admin/manage-admin.php");
		}
		else{
			//Create a session variable
			$_SESSION['add'] = "Failed to add Admin";
			//Redirect page add admin
			header("location".SITEURL."admin/manage-admin.php");
		
		}

	}
?>