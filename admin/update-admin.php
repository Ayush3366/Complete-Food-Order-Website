
<?php include('partials/css.css');?>
<?php include('partials/menu.php')?>

<div class="main-content">
	<div class="wrapper">
		<h1>Update Admin</h1>
		<br><br>

		<?php 

		//Get the Id
		$id=$_GET['id'];

		//To create sql query to get the details
		$sql = "SELECT * FROM tbl_admin WHERE id = $id";

		//Execute the query

		$res = mysqli_query($conn,$sql);

		if($res == TRUE)
		{
			$count = mysqli_num_rows($res);
			//data is available
			if($count==1)
			{
				//Get the details
				$row = mysqli_fetch_assoc($res);

				$full_name = $row['full_name'];
				$username = $row['username'];
			}

			else{
				header('location:'.SITEURL.'admin/manage-admin.php');
			}
		}


		?>


		<form action="" method="POST">
			<table class="tbl-30">
				<tr>
					<td>Full Name: </td>
					<td><input type="text" name="full_name" value="<?php echo $full_name; ?>"></td>
				</tr>

				<tr>
					<td>Username: </td>
					<td><input type="text" name="username" value="<?php echo $username;?>"></td>
				</tr>

				<tr>
					<td colspan="2">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<input type="submit" name="submit" value="Update Admin" class="btn-secondary">
					</td>
				</tr>
				
			</table>
		</form>
	</div>

</div>

<?php

// Check whether submit is clicked or not
if(isset($_POST['submit']))

{
 	//Get value from form

 	$id = $_POST['id'];
 	$full_name = $_POST['full_name'];
 	$username = $_POST['username'];

 	//create sql query to update query

 	$sql = "UPDATE tbl_admin SET 
 				full_name = '$full_name',
 				username = '$username'
 				WHERE id = $id
 			";


 			//Execute the query


 			$res = mysqli_query($conn,$sql);


 			if($res == TRUE)
 			{
 				//Query executed

 				$_SESSION['update'] = "<div class = 'success'>Admin Update Successfully</div>";
 				//Redirect to page

 				header('location:'.SITEURL.'admin/manage-admin.php');
 			}

 			else
 			{
 				$_SESSION['update'] = "<div class = 'error'>Failed to Update admin</div>";
 				//Redirect to page

 				header('location:'.SITEURL.'admin/manage-admin.php');
 			}
	}

?>



<?php include('partials/footer.php'); ?>
