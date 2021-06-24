<?php include("header.php");
    
    include('config.php');

    if($_SESSION['role'] == '1'){

        $sql = "SELECT * FROM post
        LEFT JOIN category ON post.category = category.categoryid 
        LEFT JOIN user ON post.author = user.userid ORDER BY post.post_id DESC";
    }elseif ($_SESSION['role'] == '0') {
        $sql = "SELECT * FROM post
        LEFT JOIN category ON post.category = category.categoryid 
        LEFT JOIN user ON post.author = user.userid WHERE post.author = $_SESSION[userid] ORDER BY post.post_id DESC";
    }
    $result = mysqli_query($conn,$sql) or die("query failed. ");
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
            <div class="text-right mr-5"><a type="button" class="btn btn-primary" href="addpost.php">ADD POST</a></div>
            <div class="row mt-1">
                <div class="col-sm-1 col-lg-2">
                    
                </div>
                <div class="col-12 col-sm-10 col-lg-8">
                    <div class="table-responsive">
        	
                        <table class="table table-light table-striped table-bordered m-auto">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">S.NO</th>
                                    <th scope="col">TITLE</th>
                                    <th scope="col">CATEGORY</th>
                                    <th scope="col">DATE</th>
                                    <th scope="col">AUTHER</th>
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
                                    <th scope="row"><?php echo $row['post_id'] ?></th>
                                    <td><?php echo $row['title'] ?></td>
                                    <td><?php echo $row['categoryname'] ?></td>
                                    <td><?php echo $row['post_date'] ?></td>
                                    <td><?php echo $row['username'] ?></td>
                                    <td><a href="update_post.php?id=<?php echo $row['post_id'];?>">edit</a></td>
                                    <td><a href="delete_post.php?id=<?php echo $row['post_id'];?>&catid=<?php echo $row['category'];?>">delete</a></td>
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