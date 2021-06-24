<!DOCTYPE html>
<html>
<body>
	<a href="#" class="js-blogz-nav-toggle blogz-nav-toggle"><i></i></a>
	<aside id="blogz-aside" role="complementary" class="border js-fullheight">
		<h1 id="blogz-logo"><a href="home.php">Megazine</a></h1>
		<nav id="blogz-main-menu" role="navigation">
			<?php
				include('config.php');
				if(isset($_GET['cid'])){
					$cid = $_GET['cid'];
				}
				$sql2 = "SELECT * FROM category WHERE post >0";
				$result2 = mysqli_query($conn,$sql2) or die("query failed.Category");
		        if(mysqli_num_rows($result2)>0){                
			 ?>
			<ul>
				<li ><a href="home.php">HOME</a></li>
				<?php while($row2 = mysqli_fetch_array($result2)){
					if(isset($_GET['cid'])){
						if($row2['categoryid'] == $cid){
							$active = 'blogz-active';
						}
						else{
							$active = '';
						}
					}			
				?>
				<li class="<?php echo $active ;?>"><a href="category.php?cid=<?php echo $row2['categoryid']?>"><?php echo $row2['categoryname']?></a></li>
				<?php } ?>
				<li><a href="admin_panel/login.php">Login</a></li>
			</ul>
			<?php } ?>
		</nav>	
	</aside>
</body>
</html>