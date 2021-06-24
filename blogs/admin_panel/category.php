<?php include("header.php");

if($_SESSION['role'] == '0'){

    header("location:post.php");
}

include('config.php');
$sql = "SELECT * FROM category";
$result = mysqli_query($conn,$sql) or die("query failed.");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Category</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="container-fluid mt-5">
            <div class="text-right mr-5"><a type="button" class="btn btn-primary" href="add_category.php">ADD CATEGORY</a></div>
            <div class="row mt-1">
                <div class="col-sm-1 col-lg-2">
                    
                </div>
                <div class="col-12 col-sm-10 col-lg-8">
                    <div class="table-responsive">
        	
                        <table class="table table-light table-striped table-bordered m-auto">
                            <thead class="thead-dark">
                                
                                <tr>
                                    <th scope="col">S.NO</th>
                                    <th scope="col">CATEGORY NAME</th>
                                    <th scope="col">NO. OF POSTS</th>
                                    <th scope="col">EDIT</th>
                                    <th scope="col">DELETE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(mysqli_num_rows($result)>0){ 

                                while ($row = mysqli_fetch_array($result)) { ?>
                                <tr>
                                    <th scope="row"><?php echo $row['categoryid']; ?></th>
                                    <td><?php echo $row['categoryname']; ?></td>
                                    <td><?php echo $row['post']; ?></td>
                                    <td><a href="update_category.php?id=<?php echo $row['categoryid'] ?>">edit</a></td>
                                    <td><a href="delete_category.php?id=<?php echo $row['categoryid'] ?>">delete</a></td>
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