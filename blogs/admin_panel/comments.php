<?php include("header.php");
    
if($_SESSION['role'] == '0'){

header("location:post.php");
}

include('config.php');
$sql = "SELECT * FROM comments ORDER BY cid DESC";
$result = mysqli_query($conn,$sql) or die("query failed.");

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Post</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="container-fluid mt-5">
            
            <div class="row mt-1">
                <div class="col-sm-1 col-lg-2">
                    
                </div>
                <div class="col-12 col-sm-10 col-lg-8">
                    <div class="table-responsive">
        	
                        <table class="table table-light table-striped table-bordered m-auto">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">C.NO</th>
                                    <th scope="col">NAME</th>
                                    <th scope="col">EMAIL ID</th>
                                    <th scope="col">SUBJECT</th>
                                    <th scope="col">INFORMATION</th>
                                    <th scope="col">POST ID</th>
                                    <th scope="col">DATE</th>
                                    <th scope="col">DELETE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(mysqli_num_rows($result)>0){
                                    while($row = mysqli_fetch_array($result)){
                                 ?>
                                <tr>
                                    <th scope="row"><?php echo $row['cid'] ?></th>
                                    <td><?php echo $row['fname']." ".$row['lname'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['subject'] ?></td>
                                    <td><?php echo $row['about_us'] ?></td>
                                    <td><?php echo $row['pid'] ?></td>
                                    <td><?php echo $row['cdate'] ?></td>
                                    <td><a href="delete_comment.php?id=<?php echo $row['cid'];?>">delete</a></td>
                                </tr> 
                                <?php }} ?> 
                            </tbody>                           
                        </table>
                    </div>
                </div>
                <div class="col-sm-1 col-lg-2"></div>
            </div>
        </div>		   
    </body>
</html>