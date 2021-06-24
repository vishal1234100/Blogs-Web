<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Blogz</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
	<div id="blogz-page">		
		<?php include('menu.php');?>

		<div id="blogz-main">
			<div class="blogz-blog">
				<div class="container-wrap">
					<div class="row">
						<div class="col-md-9">
							<div class="content-wrap">
								<?php
								include("config.php");
								$search = mysqli_real_escape_string($conn,$_GET['search']);
								$sql = "SELECT * FROM post
						        LEFT JOIN category ON post.category = category.categoryid 
						        LEFT JOIN user ON post.author = user.userid WHERE post.title LIKE '%$search%' or post.description LIKE '%$search%' or user.firstname LIKE '%$search%' or category.categoryname LIKE '%$search%'";
						      
						        $result = mysqli_query($conn,$sql) or die("query failed. ");
						        if(mysqli_num_rows($result)>0){
                                    while($row = mysqli_fetch_array($result)){
								?>
								<article class="blog-entry-travel animate-box">
									<div class="blog-img" style="background-image: url(admin_panel/upload/<?php echo $row['post_img'];?>);"></div>
									<div class="desc">
										<p class="meta">
											<span class="cat"><a href="category.php?cid=<?php echo $row['categoryid'];?>"><?php echo $row['categoryname'] ?></a></span>
											<span class="date"><?php echo $row['post_date'] ?></span>
											<span class="pos">By <a href="author.php?aid=<?php echo $row['userid']?>"><?php echo $row['firstname']?></a></span>
										</p>
										<h2><a href="single.php?postid=<?php echo $row['post_id'];?>"><?php echo $row['title'] ?></a></h2>
										<p><?php echo substr($row['description'],0,150) .".....";?></p>
										<p><a href="single.php?postid=<?php echo $row['post_id'];?>" class="btn btn-primary with-arrow">Read More <i class="icon-arrow-right22"></i></a></p>
									</div>
								</article>
								<?php }}else{
									echo"<div style='color:red; text-align:center;margin:10px 0; height=30px; font-size:35px;' class='bg-light'>Result Not Found.</div>"; 
								} ?> 
							</div>
						</div>
						<div class="col-md-3">
							<div class="sidebar">
								<div class="side animate-box">
									<form method="GET" action="search.php">
										<div class="form-group">
											<input type="text" class="form-control" id="search" name="search" placeholder="Enter to search...">
											<button type="submit" class="btn submit btn-primary"><i class="icon-search3"></i></button>
										</div>
									</form>
								</div>						
								
								
								<div class="side animate-box">
									<div class="form-group">
										<input type="text" class="form-control form-email text-center" id="email" placeholder="Enter your email">
										<button type="submit" class="btn btn-primary btn-subscribe">Subscribe</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="js/main.js"></script>
	</body>
</html>

