<?php include("header.php");

if($_SESSION['role'] == '0'){

    header("location:post.php");
}

if(isset($_POST['add'])){

	include('config.php');

	$category = mysqli_real_escape_string($conn,$_POST['category']);
	

	$sql = "SELECT categoryname FROM category WHERE categoryname ='$category'";
	$result = mysqli_query($conn,$sql) or die("query failed.");
	if(mysqli_num_rows($result)>0){
		echo "<p style='color:red; text-align:center;margin:10px 0;'>category name already exits.</p>";
	}else{
		$sql1 = "INSERT INTO category (categoryname) VALUES('$category')";

		if(mysqli_query($conn,$sql1)){

			header("location:category.php");
		}
	}

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Add Category</title>
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
				    				<label style="font-size:18px; font-weight:600;">Add Category</label>
				    				<input type="text" class="form-control" name="category" placeholder="category"> 		
				    			</div>
				    			
				    			<button type="submit" class="btn btn-primary" name="add" value="add">Save</button>    			
				    		</form>    						
    					</div>    					
    				</div>  					
    			</div>		
    		</div>	
    	</div>
    </body>
</html>