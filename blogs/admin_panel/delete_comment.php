<?php
include("header.php");
include("config.php");

if($_SESSION['role'] == '0'){

    header("location:post.php");
}
$cid = $_GET['id'];

$sql = "DELETE FROM comments WHERE cid =$cid";
$result = mysqli_query($conn,$sql) or die("query failed. ");

if($result){

	header("location:comments.php");
}



?>