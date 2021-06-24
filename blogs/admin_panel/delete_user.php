<?php

include("header.php");
include("config.php");
if($_SESSION['role'] == '0'){

    header("location:post.php");
}

$id = $_GET['id'];

$sql = "DELETE FROM user WHERE userid = '$id'";
if(mysqli_query($conn,$sql)){

	header("location:User.php");
}else{
	echo "<p style='color:red; text-align:center;margin:10px 0;'>Can't delete User record.</p>";
}


mysqli_close($conn);

?>