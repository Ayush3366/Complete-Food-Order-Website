<?php  
	

	include('../config/constants.php');
	//1>Get the id of Admin to be deleted
	

	$id = $_GET['id'];
	
	//2.Create SQL query to Delete Admin
	$sql = "DELETE FROM tbl_admin WHERE id = $id";


	//Execute the query

	$res = mysqli_query($conn,$sql);


	//Check whether the query executed successfully

	if($res == TRUE)
	{
		//Create session variable to display message 
		$_SESSION['delete'] = "<div class = 'success'>Admin Deleted successfully</div>";

		//Redirect to manage admin page

		header('location:'.SITEURL.'admin/manage-admin.php');
	}

	else 
	{

		$_SESSION['delete'] = "<div class = 'error'>Failed to Delete Admin</div>";

		//Redirect to manage admin page

		header('location:'.SITEURL.'admin/manage-admin.php');
	}

	//Redirect it to manage admin page when id is deleted



?>