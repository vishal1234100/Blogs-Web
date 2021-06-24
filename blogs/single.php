<?php
error_reporting(0);

if(isset($_POST['comment'])){

	include('config.php');

	$fname = mysqli_real_escape_string($conn,$_POST['fname']);
	$lname = mysqli_real_escape_string($conn,$_POST['lname']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$subject = mysqli_real_escape_string($conn,$_POST['subject']);
	$about = mysqli_real_escape_string($conn,$_POST['aboutus']);
	$postid = mysqli_real_escape_string($conn,$_POST['postid']);
	$date = date("d M Y");


	
	$sql1 = "INSERT INTO comments (fname,lname,email,subject,about_us,pid,cdate) VALUES('$fname','$lname','$email','$subject','$about','$postid','$date')";

	if(mysqli_query($conn,$sql1)){

		
	}
	

}

?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Megazine Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />
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
								$postid = $_GET['postid'];
								$sql = "SELECT * FROM post
						        LEFT JOIN category ON post.category = category.categoryid 
						        LEFT JOIN user ON post.author = user.userid WHERE post_id = $postid";
						        $result = mysqli_query($conn,$sql) or die(header("location:home.php"));
						        if(mysqli_num_rows($result)>0){
                                    while($row = mysqli_fetch_array($result)){
								?>

								<article class="animate-box">
									<div class="blog-img" style="background-image: url(admin_panel/upload/<?php echo $row['post_img'];?>);"></div>
									<div class="desc">
										<div class="meta">
											<p>
												<span><?php echo $row['categoryname'] ?></span>
												<span><?php echo $row['post_date'] ?></span>
												<span><?php echo $row['firstname'] ?></span>
												<span><a href="#">3 Comments</a></span>
											</p>
										</div>
										<h2><a href="single.php?postid=<?php echo $row['post_id'];?>"><?php echo $row['title'] ?></a></h2>
										<p><?php echo $row['description'] ?></p>
									</div>
								</article>
								<?php }} ?>
								<div class="row">
									<div class="col-md-12 animate-box">
										<h2 class="heading-2">Say something</h2>
										<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
											<div class="row form-group">
												<div class="col-md-6">
													<!-- <label for="fname">First Name</label> -->
													<input type="text" id="fname" name="fname" class="form-control" placeholder="Your firstname" required>
												</div>
												<div class="col-md-6">
													<!-- <label for="lname">Last Name</label> -->
													<input type="text" id="lname" name="lname" class="form-control" placeholder="Your lastname" required>
												</div>
											</div>

											<div class="row form-group">
												<div class="col-md-12">
													<!-- <label for="email">Email</label> -->
													<input type="email" id="email" name="email" class="form-control" placeholder="Your email address" required>
												</div>
											</div>

											<div class="row form-group">
												<div class="col-md-12">
													<!-- <label for="subject">Subject</label> -->
													<input type="text" id="subject" name="subject" class="form-control" placeholder="Your subject of this message" required>
												</div>
											</div>

											<div class="row form-group">
												<div class="col-md-12">
													<!-- <label for="message">Message</label> -->
													<textarea class="form-control" name="aboutus" placeholder="Say something" rows="6" required></textarea>
												</div>
											</div>
											<div class="row form-group">
												<div class="col-md-12">
													<!-- <label for="subject">Subject</label> -->
													<input type="hidden" id="postid" name="postid" class="form-control" placeholder="postid" value="<?php echo $postid ?>" >
												</div>
											</div>
											<div class="form-group">
												<button type="submit" name="comment" class="btn btn-primary">Save</button>
											</div>
										</form>	
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3 sticky-parent"><br>
							<div class="sidebar" id="sticky_item">
								<div class="side animate-box">
									<form method="GET" action="search.php">
										<div class="form-group">
											<input type="text" class="form-control" id="search" name="search" placeholder="Enter to search...">
											<button type="submit" class="btn submit btn-primary"><i class="icon-search3"></i></button>
										</div>
									</form>
								</div>
								<div class="side animate-box">
									<h2 class="sidebar-heading">Categories</h2>
									<p>
										<ul class="category">
											<li><a href="#">Home</a></li>
											<li><a href="#">About Me</a></li>
											<li><a href="#">Blog</a></li>
											<li><a href="#">Travel</a></li>
											<li><a href="#">Lifestyle</a></li>
											<li><a href="#">Fashion</a></li>
											<li><a href="#">Health</a></li>
										</ul>
									</p>
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

