<?php
error_reporting(0);

session_start();
if(isset($_SESSION['username'])){
    header("location:post.php");
}

include("config.php");
$username = mysqli_real_escape_string($conn,$_POST['username']);
$password = mysqli_real_escape_string($conn,md5($_POST['password']));

if(isset($_POST['login'])){

    $sql = "SELECT * FROM user WHERE username = '$username' and password = '$password' ";

    $result = mysqli_query($conn,$sql) or die("query failed.");

    if(mysqli_num_rows($result)>0){

        while ($row = mysqli_fetch_array($result)) {

            session_start();
            $_SESSION['username'] = $row['username'];
            $_SESSION['fname'] = $row['firstname'];
            $_SESSION['lname'] = $row['lastname'];
            $_SESSION['userid'] = $row['userid'];
            $_SESSION['role'] = $row['role'];

            header("location:post.php");

        }
    }
    else{

        echo "
            <div class='alert alert-danger'>UserName and PassWord are incorrected.</div>

        ";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
    	<div class="container">
    		<div class="row vh-100">
    			<div class="col-sm-10 col-md-8 col-lg-6 m-auto">
    				<div class="card m-auto p-3 shadow-lg p-3 mb-5 bg-white rounded">
    					<img src="images/login3.png" width="200px" height="200px" class="img-fluid m-auto rounded-circle">
    					<div class="card-body">
    						<form class="mt-0" method="POST" action="<?php $_SERVER['PHP_SELF']?>">
				    			<div class="form-group">
				    				<label style="font-size:22px; font-weight:600;">UserName</label>
				    				<input type="text" class="form-control" name="username" placeholder="UserName" style="height:45px; font-size:20px;">    				
				    			</div>
				    			<div class="form-group">
				    				<label style="font-size:22px; font-weight:600;">PassWord</label>
				    				<input type="password" class="form-control" name="password" placeholder="PassWord" style="height:45px;font-size:20px;">    				
				    			</div>
				    			<button type="submit" class="btn btn-primary rounded-pill" name="login"  style="font-size:23px; width:150px;">Login</button> 

				    			<a href="registration.php" class="ml-5">Sign Up</a>   			
				    		</form>    						
    					</div>    					
    				</div>  					
    			</div>		
    		</div>	
    	</div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>