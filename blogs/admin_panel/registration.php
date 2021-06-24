<?php
error_reporting(0);


if(isset($_POST['save'])){

	include('config.php');

	$fname = mysqli_real_escape_string($conn,$_POST['fname']);
	$lname = mysqli_real_escape_string($conn,$_POST['lname']);
	$user = mysqli_real_escape_string($conn,$_POST['user']);
	$password = mysqli_real_escape_string($conn,md5($_POST['password']));
	$role = mysqli_real_escape_string($conn,$_POST['role']);

	$sql = "SELECT username FROM user WHERE username ='$user' or password ='$password'";
	$result = mysqli_query($conn,$sql) or die("query failed.");
	if(mysqli_num_rows($result)>0){
		echo "<p  style='color:red; text-align:center;margin:10px 0;'>user Name or Password already exits.</p>";
	}else{
		$sql1 = "INSERT INTO user (firstname,lastname,username,password,role) VALUES('$fname','$lname','$user','$password','$role')";

		if(mysqli_query($conn,$sql1)){

			$sql3 = "SELECT * FROM user WHERE username = '$user' and password = '$password' ";

		    $result2 = mysqli_query($conn,$sql3) or die("query failed.");

		    if(mysqli_num_rows($result2)>0){

		        while ($row = mysqli_fetch_array($result2)) {

		            session_start();
		            $_SESSION['username'] = $row['username'];
		            $_SESSION['fname'] = $row['firstname'];
		            $_SESSION['lname'] = $row['lastname'];
		            $_SESSION['userid'] = $row['userid'];
		            $_SESSION['role'] = $row['role'];

		            header("location:post.php");

		        }
		    }    

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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    </head>
    <body>
    	<div class="container">
    		<div class="row mt-4 mb-3">
    			<div class="col-sm-10 col-md-8 col-lg-6 m-auto">
    				<div class="card m-auto">
    					<img src="images/login2.jpg" width="200px" height="200px" class="img-fluid m-auto pt-3 rounded-circle">
    					<div class="card-body mb-3">
    						<form class="mt-0 pb-0" method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
				    			<div class="form-group">
				    				<label style="font-size:18px; font-weight:600;">First Name</label>
				    				<input type="text" class="form-control" name="fname" placeholder="first name" required="">    				
				    			</div>
				    			<div class="form-group">
				    				<label style="font-size:18px; font-weight:600;">Last Name</label>
				    				<input type="text" class="form-control" name="lname" placeholder="last name" required="">    				
				    			</div>
				    			<div class="form-group">
				    				<label style="font-size:18px; font-weight:600;">User Name</label>
				    				<input type="text" class="form-control" name="user" placeholder="User Name" required="">    				
				    			</div>
				    			<div class="form-group">
				    				<label style="font-size:18px; font-weight:600;">PassWord</label>
				    				<input type="password" class="form-control" name="password" placeholder="PassWord" required="">    				
				    			</div>
				    			<div class="form-group">
				    				<input type="hidden" class="form-control" name="role" placeholder="PassWord" value="0" required="">			
				    			</div>
				    			<button type="submit" class="btn btn-success" name="save" value="save">Save</button>
				    			<a href="login.php" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
				    		</form>    						
    					</div>    					
    				</div>  					
    			</div>		
    		</div>	
    	</div>
    </body>
</html>