
<?php

include('connection.php');

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)) {
	header('location:login.php');
}

?>







<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>About us | .elegantWardrobe</title>
	
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	
	<!---custom css file--->
	
	<link rel="stylesheet" href="styles.css">
	
	
	
	
</head>

<body>
	
	<?php include('header.php'); ?>
	
	
		<div class="heading">
	
			<h3>About Us</h3>
			<p><a href="home.php">Home</a> / .elegantWardrobe</p>
			
		</div>
	
		<section class="about">
	
		<div class="flex">
		
			<div class="image">
			
				<img src="images/header4.jpg" alt="">
			
			</div>
			<div class="content">
			
				<h3>what is so special About Us!</h3>
				
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi facilis, distinctio adipisci asperiores porro ea accusantium voluptatibus maxime, consectetur qui eaque quis cumque cupiditate iure, praesentium quisquam consequatur aliquam soluta.</p>
				<p>Fashion worth cherishing - A collection that pays tribute to the love we have for our clothes</p>
				<p>bottle2fashion - From plastic waste to wardrobes and beyond</p>
				<p>The future looks circular - A collection designed to be treasured, shared, repaired and recycled.</p>
				<p>Sharing is always in season - Wear. Care. Recycle</p>
				<a href="contact.php" class="btn">Contact Us</a>
			</div>
			
		</div>
	
	</section>
	
	<section class="achievements">
	
	<h1 class="title">A few achievements from the past year that we’re kind of proud of. </h1>
		
		<div class="box-container">
		
			<div class="box">
			
				<img src="images/dowjones.jpg" alt="">
				
				<p>For the eighth year running, elegantWardrobe was included in the Dow Jones World Index. We ranked fourth in 2020, with a score of 70/100. In addition, we were listed in the Dow Jones European Index with the highest possible score for human rights, environmental reporting, social reporting and materiality. We also reached the highest score in our industry for supply chain management.</p>
				
				<div class="ranks">
				
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star-half-alt"></i>
				
				</div>
				
				<h3>Dow Jones World Index</h3>
				
			</div>
			
			
				<div class="box">
			
				<img src="images/ftse4good.jpg" alt="">
				
				<p>elegantWardrobe has qualified to be a part of the FTSE4Good Index Series. This means that, based on independent assessments, we can demonstrate and measure strong environmental, social and governance standards.</p>
				
				<div class="ranks">
				
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					
				
				</div>
				
				<h3>FTSE4Good</h3>
				
			</div>
			
				<div class="box">
			
				<img src="images/cdp.jpg" alt="">
				
				<p>CDP (Carbon Disclosure Project) is a non-profit organization that recognizes companies tackling climate change. In their annual A List, CDP names the world’s most pioneering companies when it comes to environmental transparency and performance. We made it to the prestigious list in 2022 thanks to our actions to cut emissions, diminish climate risks and build a zero-carbon future.</p>
				
				<div class="ranks">
				
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
				
				</div>
				
				<h3>CDP A List</h3>
				
			</div>
		
		</div>
	
	</section>
	
	
	<!---brands and partners----->
	
	
	
	
	
	
	
	
	<?php include('footer.php'); ?>
	
	
	
	<!--admin js file link------>
	
	<script src="script.js"></script>
	
</body>
</html>