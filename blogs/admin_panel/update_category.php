<?php include("header.php");

if($_SESSION['role'] == '0'){

    header("location:post.php");
}
include("config.php");
$catid = $_GET['id'];
$sql = "SELECT * FROM category WHERE categoryid = $catid";
$result = mysqli_query($conn,$sql) or die('query failed.');
$row = mysqli_fetch_array($result);
if(isset($_POST['Update'])){	

	$category = mysqli_real_escape_string($conn,$_POST['category']);
	$post = mysqli_real_escape_string($conn,$_POST['post']);
	$categoryid = mysqli_real_escape_string($conn,$_POST['categoryid']);
	echo $sql1 = "UPDATE category SET categoryname = '$category',post=$post WHERE categoryid=$categoryid";

	if(mysqli_query($conn,$sql1)){

		header("location:category.php");
	}

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Update Category</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    	<div class="container">
    		<div class="row mt-4 mb-3">
    			<div class="col-sm-10 col-md-8 col-lg-6 m-auto">
    				<div class="card m-auto">
    					<div class="card-body mb-3">
    						<form class="mt-0 pb-0" method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
    							<div class="form-group">
				    				<input type="hidden" class="form-control" name="categoryid" placeholder="categoryid" value="<?php echo $row['categoryid'] ?>"> 		
				    			</div>
				    			<div class="form-group">
				    				<label style="font-size:18px; font-weight:600;">Update Category</label>
				    				<input type="text" class="form-control" name="category" placeholder="category" value="<?php echo $row['categoryname'] ?>"> 		
				    			</div>
				    			<div class="form-group">
				    				<label style="font-size:18px; font-weight:600;">Update Post</label>
				    				<input type="text" class="form-control" name="post" placeholder="Update Post" value="<?php echo $row['post'] ?>"> 		
				    			</div>
				    			
				    			<button type="submit" class="btn btn-primary" name="Update" value="Update">Update</button>    			
				    		</form>    						
    					</div>    					
    				</div>  					
    			</div>		
    		</div>	
    	</div>
    </body>
</html>