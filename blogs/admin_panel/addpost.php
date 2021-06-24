<?php include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Add Post</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    	<div class="container">
    		<div class="row mt-4 mb-3">
    			<div class="col-sm-10 col-md-8 col-lg-6 m-auto">
    				<div class="card m-auto">
    					<div class="card-body mb-3">
    						<form class="mt-0 pb-0" method="POST" action="savepost.php" enctype="multipart/form-data">
				    			<div class="form-group">
				    				<label style="font-size:18px; font-weight:600;">Title</label>
				    				<input type="text" class="form-control" name="title" placeholder="Title" required>    				
				    			</div>
				    			<div class="form-group">
				    				<label style="font-size:18px; font-weight:600;">Description</label>
				    				<textarea class="form-control" name="description" placeholder="Description" rows="6" required></textarea>
				    			</div>
				    			<div class="form-group">
				    				<label style="font-size:18px; font-weight:600;">Category</label>
				    				<?php
				    					include('config.php');
										$sql = "SELECT * FROM category";
										$result = mysqli_query($conn,$sql) or die("query failed.");
										if(mysqli_num_rows($result)>0){
				    				?>
				    				<select class="form-control" name="category">
				    					<?php while ($row=mysqli_fetch_array($result)) { ?>
				    					<option value="<?php echo $row['categoryid'];?>"><?php echo $row['categoryname'];?></option>
				    					<?php } ?>
								    					
				    				</select> 
				    				<?php } ?>  				
				    			</div>
				    			<div class="form-group">
				    				<label style="font-size:18px; font-weight:600;">Post Image</label>
				    				<input type="file" class="form-control-file" name="file" placeholder="file" required>    				
				    			</div>
				    			<button type="submit" class="btn btn-primary" name="save" value="post">Save</button>    			
				    		</form>    						
    					</div>    					
    				</div>  					
    			</div>		
    		</div>	
    	</div>
    </body>
</html>