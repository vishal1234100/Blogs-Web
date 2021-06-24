<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-sm navbar-light sticky-top bg-light p-2">
                <a class="navbar-brand mr-auto pl-3" href=""><strong>BLOGZ</strong></a> 
                <b class="mr-auto pl-3 text-danger">welcome <?php echo $_SESSION['fname'] ." ".$_SESSION['lname'];?></b>

                <button class="navbar-toggler mr-2" type="button" data-toggle="collapse" aria-controls="lable" data-target="#lable" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon btn-sm"></span>
                </button>
                <div class="collapse navbar-collapse" id="lable">
                    <div class="navbar-nav ml-auto">
                        <a class="nav-link text-hover mr-2" href="post.php">POST</a>
                        <?php
                        if($_SESSION['role'] == '1'){

                        ?>
                        <a class="nav-link text-hover mr-2" href="category.php">CATEGORY</a>
                        <a class="nav-link text-hover mr-3" href="User.php">USERS</a>
                        <a class="nav-link text-hover mr-3" href="comments.php">COMMENTS</a> 
                        
                        <?php } ?>
                        <button type="button" class="btn btn-outline-primary btn-sm mr-4 px-3 rounded-pill" onclick="displayBlog();">BLOGS</button>
                        <a type="button" class="btn btn-primary mr-3" href="logout.php">LogOut</a>               
                    </div>
                </div>                  
            </nav> 
        </header>

    	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> 
        <script type="text/javascript">
            function displayBlog(){
                window.location.href = "http://localhost/blogs/Mini_Project_WD_DBMS/home.php";
            }
        </script>  
    
    </body>
</html>