<?php include('header.php');
include("config.php");

$postid = $_GET["id"];
$sql = "SELECT * FROM post
LEFT JOIN category ON post.category = category.categoryid 
LEFT JOIN user ON post.author = user.userid WHERE post.post_id = $postid ";
$result = mysqli_query($conn,$sql) or die("query failed. ");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Update Post</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    	<div class="container">
    		<div class="row mt-4 mb-3">
    			<div class="col-sm-10 col-md-8 col-lg-6 m-auto">
    				<div class="card m-auto">
    					<div class="card-body mb-3">
    						<?php
                            if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_array($result)){
                             ?>
    						<form class="mt-0 pb-0" method="POST" action="save_update_post.php" enctype="multipart/form-data">
    							<div class="form-group">				    				
				    				<input type="hidden" class="form-control" name="postid" placeholder="id" value="<?php echo $row['post_id'];?>">    				
				    			</div>
				    			<div class="form-group">
				    				<label style="font-size:18px; font-weight:600;">Title</label>
				    				<input type="text" class="form-control" name="title" placeholder="Title" value="<?php echo $row['title']; ?>" required >    				
				    			</div>
				    			<div class="form-group">
				    				<label style="font-size:18px; font-weight:600;">Description</label>
				    				<textarea class="form-control" name="description" placeholder="Description" rows="6" required><?php echo $row['description']; ?></textarea>
				    			</div>
				    			<div class="form-group">
				    				<label style="font-size:18px; font-weight:600;">Category</label>
				    				<?php
				    					include('config.php');
										$sql1 = "SELECT * FROM category";
										$result1 = mysqli_query($conn,$sql1) or die("query failed.");
										if(mysqli_num_rows($result1)>0){
				    				?>
				    				<select class="form-control" name="category">
				    					<?php while ($row1=mysqli_fetch_array($result1)) { 

				    						if($row['category'] == $row1['categoryid']){
				    							$selected = "selected";
				    						}
				    						else{
				    							$selected = "";

				    						}
				    					?>
				    					<option <?php echo $selected ?> value="<?php echo $row1['categoryid'];?>"><?php echo $row1['categoryname'];?></option>
				    					<?php } ?>
								    					
				    				</select> 
				    				<?php } ?>  				
				    			</div>
				    			<div class="form-group">
				    				<label style="font-size:18px; font-weight:600;">Post Image</label>
				    				<input type="file" class="form-control-file" name="file" placeholder="file" ><br>
				    				<img src="upload/<?php echo $row['post_img'];?>" height="150px" width="150px">
				    				<input type="hidden" name="oldimg" value="<?php echo $row['post_img'];?>">
	  				
				    			</div>
				    			<button type="submit" class="btn btn-primary" name="update" value="post">update</button>    			
				    		</form>
				    		<?php  }} ?>    						
    					</div>    					
    				</div>  					
    			</div>		
    		</div>	
    	</div>
    </body>
</html>