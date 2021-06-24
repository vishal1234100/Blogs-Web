<?php include("header.php");

if($_SESSION['role'] == '0'){

    header("location:post.php");
}

if(isset($_POST['save'])){

	include('config.php');

	$fname = mysqli_real_escape_string($conn,$_POST['fname']);
	$lname = mysqli_real_escape_string($conn,$_POST['lname']);
	$user = mysqli_real_escape_string($conn,$_POST['user']);
	$password = mysqli_real_escape_string($conn,md5($_POST['password']));
	$role = mysqli_real_escape_string($conn,$_POST['role']);

	$sql = "SELECT username FROM user WHERE username ='$user'";
	$result = mysqli_query($conn,$sql) or die("query failed.");
	if(mysqli_num_rows($result)>0){
		echo "<p style='color:red; text-align:center;margin:10px 0;'>user name already exits.</p>";
	}else{
		$sql1 = "INSERT INTO user (firstname,lastname,username,password,role) VALUES('$fname','$lname','$user','$password','$role')";

		if(mysqli_query($conn,$sql1)){

			header("location:User.php");
		}
	}

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Add User</title>
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
				    				<label style="font-size:18px; font-weight:600;">First Name</label>
				    				<input type="text" class="form-control" name="fname" placeholder="first name">    				
				    			</div>
				    			<div class="form-group">
				    				<label style="font-size:18px; font-weight:600;">Last Name</label>
				    				<input type="text" class="form-control" name="lname" placeholder="last name">    				
				    			</div>
				    			<div class="form-group">
				    				<label style="font-size:18px; font-weight:600;">User Name</label>
				    				<input type="text" class="form-control" name="user" placeholder="User Name">    				
				    			</div>
				    			<div class="form-group">
				    				<label style="font-size:18px; font-weight:600;">PassWord</label>
				    				<input type="password" class="form-control" name="password" placeholder="PassWord">    				
				    			</div>
				    			<div class="form-group">
				    				<label style="font-size:18px; font-weight:600;">User Role</label>
				    				<select class="form-control" name="role">
				    					<option value="0">Normal User</option>
				    					<option value="1">Admin</option>
				    					
				    				</select>   				
				    			</div>
				    			<button type="submit" class="btn btn-primary" name="save" value="save">Save</button>    			
				    		</form>    						
    					</div>    					
    				</div>  					
    			</div>		
    		</div>	
    	</div>
    </body>
</html>