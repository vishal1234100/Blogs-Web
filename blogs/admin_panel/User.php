<?php

    include("header.php");
    include('config.php');
    if($_SESSION['role'] == '0'){

        header("location:post.php");
    }

    $sql = "SELECT * FROM user ORDER BY userid DESC";
    $result = mysqli_query($conn,$sql) or die("query failed. ");


 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>User</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="container-fluid mt-5">
            <div class="text-right mr-5"><a type="button" class="btn btn-primary" href="adduser.php">ADD USER</a></div>
            <div class="row mt-1">
                <div class="col-sm-1 col-lg-2">                    
                </div>
                <div class="col-12 col-sm-10 col-lg-8">
                    <div class="table-responsive">
        	
                        <table class="table table-light table-striped table-bordered m-auto">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">S.NO</th>
                                    <th scope="col">FULL NAME</th>
                                    <th scope="col">USER NAME</th>
                                    <th scope="col">ROLE</th>
                                    <th scope="col">EDIT</th>
                                    <th scope="col">DELETE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 

                                if(mysqli_num_rows($result)>0){

                                    while($row = mysqli_fetch_array($result)){
                                 ?>

                                <tr>
                                    <th scope="row"><?php echo $row['userid'] ?></th>
                                    <td><?php  echo $row['firstname']." ".$row['lastname'] ?></td>
                                    <td><?php  echo $row['username'] ?></td>
                                    <td><?php  

                                    if($row['role'] == 1){
                                        echo "Admin";
                                    }
                                    else{

                                        echo "Normal";
                                    }



                                    ?></td>
                                    <td><a href="update_user.php?id=<?php echo $row['userid'] ?>">edit</a></td>
                                    <td><a href="delete_user.php?id=<?php echo $row['userid'] ?>">delete</a></td>
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