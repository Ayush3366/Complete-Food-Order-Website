<?php include('partials/css.css');?>
<?php include('partials/menu.php');?>



<div class="main-content">
	<div class="wrapper">
		<h1>Change Password</h1>
		<br><br>

		<?php

		if(isset($_GET['id']))
		{
			$id=$_GET['id'];
		}

		?>

		<form action="" method="POST">
			
			<table class="tbl-30">
				<tr>
					<td>Current Password: </td>
					<td>
						<input type="text" name="current_password" placeholder="Old Password">
					</td>
				</tr>
				
				<tr>
					<td>New Password:</td>
					<td>
						<input type="text" name="new_password" placeholder="New Password">
						
					</td>
				</tr>

				<tr>
					<td>Confirm Password: </td>
					<td>
						<input type="password" name="confirm_password" placeholder="Confirm Password">
					</td>
				</tr>

				<tr>
					<td colspan="2">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<input type="submit" class="btn-secondary" name="submit" value="Change Password">
					</td>
				</tr>

			</table>

		</form>


	</div>
	
</div>

<?php
	//Check whether submit button clicked or not
if(isset($_POST['submit']))
{
	//echo "clicked";

	//1.Get the data from form
		$id = $_POST['id'];
		$current_password = md5($_POST['current_password']);
		$new_password = md5($_POST['new_password']);
		$confirm_password = md5($_POST['confirm_password']);
	//2/Check whether the user with current ID and Current passowrd Exists or not
		$sql = "SELECT * FROM tbl_admin WHERE id = $id AND password = '$current_password'";

	//Execute query

		$res = mysqli_query($conn,$sql);


		if($res==TRUE)
		{
			$count = mysqli_num_rows($res);

			if($count == 1)
			{
				//Check whether the new password and confirm match or not
				if($new_password == $confirm_password)
				{
					//Update the password
					$sql2 = "UPDATE tbl_admin SET 
							 password='$new_password' WHERE id = $id	
							";

					$res2 = mysqli_query($conn,$sql2);

					if($res2 == TRUE){
						$_SESSION['change-pwd'] = "<div class = 'success'>Password changed Successfully </div>";
					header('location:'.SITEURL.'admin/manage-admin.php');
					}
					else
					{
						$_SESSION['pwd-not-match'] = "<div class = 'error'>Failed to Change Password </div>";
					header('location:'.SITEURL.'admin/manage-admin.php');
					}		
				}
				else{
					//Redirect to manage admin with error message
					$_SESSION['pwd-not-match'] = "<div class = 'error'>Password did not match </div>";
					header('location:'.SITEURL.'admin/manage-admin.php');
					}
			}
			
			else
			{
				$_SESSION['user-not-found'] = "<div class = 'error'>User not found </div>";
				header('location:'.SITEURL.'admin/manage-admin.php');
			}
		}
	//3.Check New password and confirm password match or not

	//4.Change password if all above is true
}


?>


<?php include('partials/footer.php'); ?>



