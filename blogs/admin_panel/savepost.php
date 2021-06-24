<?php include("header.php");
include('config.php');

if($_SESSION['role'] == '0'){

    header("location:post.php");
}

if(isset($_POST['save'])){

	$filename = $_FILES['file']['name'];
	$filesize = $_FILES['file']['size'];
	$filetemp = $_FILES['file']['tmp_name'];
	$filetype = $_FILES['file']['type'];

	move_uploaded_file($filetemp,"upload/".$filename);
	
	$title = mysqli_real_escape_string($conn,$_POST['title']);
	$description = mysqli_real_escape_string($conn,$_POST['description']);
	$category = mysqli_real_escape_string($conn,$_POST['category']);
	$date = date("d M Y");
	$author = $_SESSION['userid'];
	

	$sql = "INSERT INTO post(title,description,category,post_date,author,post_img) VALUES ('$title','$description',$category,'$date','$author','$filename');";
	$sql .= "UPDATE category SET post = post+1 WHERE categoryid = $category";
	if(mysqli_multi_query($conn,$sql)){

		header("location:post.php");
	}
	else{
		echo "<div class='alert alert-danger'>query failed.</div>";
	}

}

?>