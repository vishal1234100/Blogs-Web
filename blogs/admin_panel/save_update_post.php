<?php include("header.php");
include('config.php');

if($_SESSION['role'] == '0'){

    header("location:post.php");
} 

if(isset($_POST['update'])){

	$filename = "";
	$filetemp = "";
	$filesize = "";
	$filetype = "";

	if(empty($_FILES['file']['name'])){

		$filename = $_POST['oldimg'];
	}

	else{
		$filename = $_FILES['file']['name'];
		$filesize = $_FILES['file']['size'];
		$filetemp = $_FILES['file']['tmp_name'];
		$filetype = $_FILES['file']['type'];
	}

	move_uploaded_file($filetemp,"upload/".$filename);
	
	$title = mysqli_real_escape_string($conn,$_POST['title']);
	$description = mysqli_real_escape_string($conn,$_POST['description']);
	$category = mysqli_real_escape_string($conn,$_POST['category']);
	$date = date("d M Y");
	$postid = mysqli_real_escape_string($conn,$_POST['postid']);

	$sql = "UPDATE post SET title='$title',description='$description',category='$category',post_date='$date',post_img = '$filename' WHERE post_id = '$postid'";
	if(mysqli_query($conn,$sql)){

		header("location:post.php");
	}

}

?>