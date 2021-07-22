<?php
include('../config/constants.php');
// echo "Delete food page";

if(isset($_GET['id']) && isset($_GET['image_name']))
{
	// Proces the delete
	// echo "Process to delete";

	//1. Get Id And Image NAme
	$id = $_GET['id'];
	$image_name = $_GET['image_name'];
	// 2.Remove image if Available
	if($image_name!="")
	{
		// Has image so has to remove
		// get image path

		$path = "../images/food/".$image_name;
		// Remove image file from folder

		$remove = unlink($path);

		// Check whether image is removed or not
		if($remove == false)
		{
			$_SESSION['upload'] = "<div class = 'error'>Failed To Remove Image File</div>";
			header('location:'.SITEURL.'admin/manage-food.php');
			// Stop the process of deleting food
			die();
		}
	}
	// 3.Delete Food from database
	$sql = "DELETE FROM tbl_food WHERE id=$id";

	// Execute query

	$res = mysqli_query($conn,$sql);


	// Check whether the query executed or not and set session message

	if($res == true)
	{
		// Food deleted
		$_SESSION['delete'] = "<div class = 'success'>Food Deleted Successfully</div>";
		header('location:'.SITEURL.'admin/manage-food.php');
	}
	else
	{
		// FAiled to delete
		$_SESSION['delete'] = "<div class = 'error'>Failed To delete Food. </div>";
		header('location:'.SITEURL.'admin/manage-food.php');
	}
	// 4.Redirect to Manage food with session message

}
else
{
	// Redirect to Manage food page
	// echo "Redirect";

	$_SESSION['delete'] = "<div class = 'error'>Unauthorized Access</div>";
	header('location:'.SITEURL.'admin/manage-food.php');
}

?>