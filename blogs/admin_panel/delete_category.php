<?php include("header.php");

if($_SESSION['role'] == '0'){

    header("location:post.php");
}
include("config.php");
$catid = mysqli_real_escape_string($conn,$_GET['id']);
$sql ="DELETE FROM category WHERE categoryid =$catid ";
$result = mysqli_query($conn,$sql) or die('query failed.');
if($result){
header("location:category.php");

}

?>