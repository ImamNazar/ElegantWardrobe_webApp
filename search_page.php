
<?php

include('connection.php');

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)) {
	header('location:login.php');
};


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
<title>Search | .elegantWardrobe</title>
	
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	
	<!---custom css file--->
	
	<link rel="stylesheet" href="styles.css">
	
	
	
	
</head>

<body>
	
	<?php include('header.php'); ?>
	
	<div class="heading">
	
			<h3>Search Products</h3>
			<p><a href="home.php">Home</a> / .elegantWardrobe</p>
			
		</div>
	
	<section class="search-form">
	
		<form action="" method="post">
		
			<input type="text" name="search" placeholder="What are you looking for?" class="formbox">
			<input type="submit" name="submit" value="Search" class="btn">
		
		</form>
	
	</section>
	
	<section class="products" style="padding-top: 0;">
		
		
		<div class="box-container">
			
		<?php
		
		if(isset($_POST['submit'])) {
			$search_item = $_POST['search'];
			
			$select_menproducts = mysqli_query($conn, "SELECT * FROM `shop_men` WHERE name LIKE '%{$search_item}%'") or die('Query failed!');
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
				echo '<p class="empty">No results found!</p>';
			}
			
			}else{
			echo '<p class="empty">Search bar is empty!</p>';
		}
			
		?>

		</div>
		
		
			<div class="box-container">
			
		<?php
		
		if(isset($_POST['submit'])) {
			$search_item = $_POST['search'];
			
			$select_womenproducts = mysqli_query($conn, "SELECT * FROM `shop_women` WHERE name LIKE '%{$search_item}%'") or die('Query failed!');
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
				echo '<p class="empty">No results found!</p>';
			}
			
			}else{
			echo '<p class="empty">Search bar is empty!</p>';
		}
			
		?>

		</div>
	
			<div class="box-container">
			
		<?php
		
		if(isset($_POST['submit'])) {
			$search_item = $_POST['search'];
			
			$select_kidsproducts = mysqli_query($conn, "SELECT * FROM `shop_kids` WHERE name LIKE '%{$search_item}%'") or die('Query failed!');
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
				echo '<p class="empty">No results found!</p>';
			}
			
			}else{
			echo '<p class="empty">Search bar is empty!</p>';
		}
			
		?>

		</div>
	
	</section>
	
	
	
	
	
	
	
	
	
	
	<?php include('footer.php'); ?>
	
	
	
	<!--admin js file link------>
	
	<script src="script.js"></script>
	
</body>
</html>