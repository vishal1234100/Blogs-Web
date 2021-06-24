<?php include("header.php");
include('config.php');
if($_SESSION['role'] == '0'){

    header("location:post.php");
}

if(isset($_POST['save'])){

	$userid1 = mysqli_real_escape_string($conn,$_POST['id']);
	echo $fname = mysqli_real_escape_string($conn,$_POST['fname']);
	$lname = mysqli_real_escape_string($conn,$_POST['lname']);
	$user = mysqli_real_escape_string($conn,$_POST['user']);
	$role = mysqli_real_escape_string($conn,$_POST['role']);

	$sql = "UPDATE user SET firstname='$fname',lastname='$lname',username='$user',role='$role' WHERE userid = '$userid1'";
	if(mysqli_query($conn,$sql)){

		header("location:User.php");
	}

}

// update user
	$userid = $_GET['id'];
	$sql1 = "SELECT * FROM user WHERE userid ='$userid'";
    $result1 = mysqli_query($conn,$sql1) or die("query failed. ");
    if(mysqli_num_rows($result1)>0){

    	while($row = mysqli_fetch_array($result1)){

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Update User</title>
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
				    				
				    				<input type="hidden" class="form-control" name="id" placeholder="userid" value="<?php echo $row['userid'];?>">    				
				    			</div>
				    			<div class="form-group">
				    				<label style="font-size:18px; font-weight:600;">First Name</label>
				    				<input type="text" class="form-control" name="fname" placeholder="first name" value="<?php echo $row['firstname'];?>">    				
				    			</div>
				    			<div class="form-group">
				    				<label style="font-size:18px; font-weight:600;">Last Name</label>
				    				<input type="text" class="form-control" name="lname" placeholder="last name" value="<?php echo $row['lastname']; ?>">    				
				    			</div>
				    			<div class="form-group">
				    				<label style="font-size:18px; font-weight:600;">User Name</label>
				    				<input type="text" class="form-control" name="user" placeholder="User Name" value="<?php echo $row['username']; ?>">    				
				    			</div>
				    			
				    			<div class="form-group">
				    				<label style="font-size:18px; font-weight:600;">User Role</label>
				    				<select class="form-control" name="role" value="<?php echo $row['role'] ?>">
				    					<?php 

				    					if($row['role'] == 1){
	                                        echo '<option value="0">Normal User</option>
				    							  <option value="1" selected>Admin</option>';
	                                    }
	                                    else{

	                                        echo '<option value="0" selected>Normal User</option>
				    							  <option value="1">Admin</option>';
	                                    }

				    					?>				    					
				    				</select>   				
				    			</div>
				    			<button type="submit" class="btn btn-primary" name="save" value="Update">Update</button>   			
				    		</form>

				    		<?php  }} ?>   						
    					</div>    					
    				</div>  					
    			</div>		
    		</div>	
    	</div>
    </body>
</html>