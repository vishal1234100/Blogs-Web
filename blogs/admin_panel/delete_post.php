<?php
include("header.php");
include("config.php");

if($_SESSION['role'] == '0'){

    header("location:post.php");
}
$postid = $_GET['id'];
$categoryid = $_GET['catid'];

$sql1 = "SELECT * FROM post WHERE post_id = $postid";
$result1 = mysqli_query($conn,$sql1) or die("query failed:image");
$row = mysqli_fetch_array($result1);
unlink("upload/".$row['post_img']);

$sql = "DELETE FROM post WHERE post_id = '$postid';";
$sql .= "UPDATE category SET post = post-1 WHERE categoryid = '$categoryid'";

$result = mysqli_multi_query($conn,$sql);

if($result){

	header("location:post.php");
}
else{

	echo "query failed";
}
?>