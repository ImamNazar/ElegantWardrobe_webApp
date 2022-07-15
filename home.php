
<?php

include('connection.php');

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)) {
	header('location:login.php');
}



if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('Query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'Already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('Query failed');
      $message[] = 'Product added to cart!';
   }

}


?>







<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home | .elegantWardrobe</title>
	
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	
	<!---custom css file--->
	
	<link rel="stylesheet" href="styles.css">
	
	
	
	
</head>

<body>
	
	<?php include('header.php'); ?>
	
	
	
	
	<section class="home">
	
		<div class="content">
		
		<h3>Hand Made Quality products to your door.</h3>
		<p>Welcome to elegantWardrpobe - the web's one-stop shop for apparel of all kinds. We offer a wide selection of blank apparel styles, brands, and sizes for crafting, DIY projects, and just wearing every day. Our goal is to satisfy the apparel needs of online shoppers with plenty of options, a user-friendly site and affordable prices.</p>
		<a href="about.php" class="white-btn">Explore Now</a>
		
		
		
		</div>
		
	
	</section>
	
	<section class="products">
		
		
	<h1 class="title">Latest Men Products</h1>
	<div class="box-container">
	 
	
	
	
		
		<?php 
		
		$select_menproducts = mysqli_query($conn, "SELECT * FROM `shop_men` LIMIT 3") or die('Query failed!');
		if(mysqli_num_rows($select_menproducts) > 0) {
			while($fetch_menproducts =mysqli_fetch_assoc($select_menproducts)) {
				
		
		?>
		<form action="" method="post" class="box">
		
		<img src="uploaded/<?php echo $fetch_menproducts['image'];?>" alt="">
		<div class="name"><?php echo $fetch_menproducts['name'];?></div>
		<div class="price">LKR <?php echo $fetch_menproducts['price'];?>/-</div>
		<input type="number" min="1" name="product_quantity" value="1" class="qty">	
		
		<input type="hidden" name="product_name" value="<?php echo $fetch_menproducts['name'];?>">
		<input type="hidden" name="product_price" value="<?php echo $fetch_menproducts['price'];?>">
		<input type="hidden" name="product_image" value="<?php echo $fetch_menproducts['image'];?>">
			
		<input type="submit" value="add to cart" name="add_to_cart" class="btn">
		</form>
		<?php
				}
			}else{
				echo '<p class="empty">No Products are Available!</p>';
			}
		?>
		
	</div>
		
	<br />
	
		
	<h1 class="title">Latest Women Products</h1>	
	<div class="box-container">
	
		
		<?php 
		
		$select_womenproducts = mysqli_query($conn, "SELECT * FROM `shop_women` LIMIT 3") or die('Query failed!');
		if(mysqli_num_rows($select_womenproducts) > 0) {
			while($fetch_womenproducts =mysqli_fetch_assoc($select_womenproducts)) {
				
		
		?>
		<form action="" method="post" class="box">
		
		<img src="uploaded/<?php echo $fetch_womenproducts['image'];?>" alt="">
		<div class="name"><?php echo $fetch_womenproducts['name'];?></div>
		<div class="price">LKR <?php echo $fetch_womenproducts['price'];?>/-</div>
		<input type="number" min="1" name="product_quantity" value="1" class="qty">	
		
		<input type="hidden" name="product_name" value="<?php echo $fetch_womenproducts['name'];?>">
		<input type="hidden" name="product_price" value="<?php echo $fetch_womenproducts['price'];?>">
		<input type="hidden" name="product_image" value="<?php echo $fetch_womenproducts['image'];?>">
			
		<input type="submit" value="add to cart" name="add_to_cart" class="btn">
		</form>
		<?php
				}
			}else{
				echo '<p class="empty">No Products are Available!</p>';
			}
		?>
		
	</div>
		
	<br />
	
	
		
	<h1 class="title">Latest Kids Products</h1>	
	<div class="box-container">
		
	
	
		<?php 
		
		$select_kidsproducts = mysqli_query($conn, "SELECT * FROM `shop_kids` LIMIT 3") or die('Query failed!');
		if(mysqli_num_rows($select_kidsproducts) > 0) {
			while($fetch_kidsproducts =mysqli_fetch_assoc($select_kidsproducts)) {
				
		
		?>
		<form action="" method="post" class="box">
		
		<img src="uploaded/<?php echo $fetch_kidsproducts['image'];?>" alt="">
		<div class="name"><?php echo $fetch_kidsproducts['name'];?></div>
		<div class="price">LKR <?php echo $fetch_kidsproducts['price'];?>/-</div>
		<input type="number" min="1" name="product_quantity" value="1" class="qty">	
		
		<input type="hidden" name="product_name" value="<?php echo $fetch_kidsproducts['name'];?>">
		<input type="hidden" name="product_price" value="<?php echo $fetch_kidsproducts['price'];?>">
		<input type="hidden" name="product_image" value="<?php echo $fetch_kidsproducts['image'];?>">
			
		<input type="submit" value="add to cart" name="add_to_cart" class="btn">
		</form>
		<?php
				}
			}else{
				echo '<p class="empty">No Products are Available!</p>';
			}
		?>
		
	</div>
		
		<div class="explore" style="margin-top: 1rem; text-align: center">
			
			<a href="shopmen.php" class="option-btn">Explore</a>
		
		</div>

	
	</section>
	
	<section class="about">
	
		<div class="flex">
		
			<div class="image">
			
				<img src="images/header4.jpg" alt="">
			
			</div>
			<div class="content">
			
				<h3>About Us</h3>
				<p>Shop for women's, men's and kids' fashion, beauty and home essentials online! We offer quality styles at the best price and in a sustainable way.</p>
				<a href="about.php" class="btn">read more...</a>
			</div>
			
		</div>
	
	</section>
	
	<section class="home-contact">
	
	<div class="content">
	
		<h3>Get in Touch!</h3>
	<p>You can chat with our Virtual assistant 24/7 for answers to frequently asked questions, and be put through to a live agent if you need more help. We offer 24/7 customer service.</p>
		<p>LET'S CONNECT ON SOCIAL MEDIA</p>
	<a href="contact.php" class="btn">contact us</a>
		
	</div>
	
	</section>
	
	
	
	
	
	
	<?php include('footer.php'); ?>
	
	
	
	<!--admin js file link------>
	
	<script src="script.js"></script>
	
</body>
</html>