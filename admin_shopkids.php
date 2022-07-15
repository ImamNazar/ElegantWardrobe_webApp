<?php

include('connection.php');

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)) {
	header('location:login.php');
};

if(isset($_POST['add_kidsproduct'])) {
	
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$price = $_POST['price'];
	$image = $_FILES['image']['name'];
	$image_size = $_FILES['image']['size'];
	$image_tmp_name  = $_FILES['image']['tmp_name'];
	$image_folder  = 'uploaded/'.$image;
	
	
	
	$select_kidsproduct_name = mysqli_query($conn, "SELECT name FROM shop_kids WHERE name = '$name'") or die('Query failed!');
	
	if(mysqli_num_rows($select_kidsproduct_name) > 0) {
		$message[] = 'Product Name is already added';
	}else{
		$add_kidsproduct_query = mysqli_query($conn, "INSERT INTO `shop_kids`(name, price, image) VALUES('$name', '$price', '$image')") or die('Query Failed!');
		
		if($add_kidsproduct_query) {
			if($image_size > 2000000) {
				$message[] ='Image Size is too large!';
			}else{
				move_uploaded_file($image_tmp_name, $image_folder);
			$message[] = 'New Product added successfully!';
			}
			
		}else{
			$message[] = 'New Product could not be added!';
		}
	}
}

if(isset($_GET['delete'])) {
	$delete_id = $_GET['delete'];
	$delete_image_query = mysqli_query($conn, "SELECT image FROM shop_kids WHERE id = '$delete_id'") or die('Query failed!');
	$fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
	unlink('uploaded/'.$fetch_delete_image['image']);
	mysqli_query($conn, "DELETE FROM shop_kids WHERE id = '$delete_id'") or die('Query Failed!');
	header('location:admin_shopkids.php');
}


if(isset($_POST['update_product'])) {
	
	$update_p_id = $_POST['update_p_id'];
	$update_name = $_POST['update_name'];
	$update_price = $_POST['update_price'];
	
	mysqli_query($conn, "UPDATE shop_kids SET name = '$update_name', price = '$update_price' WHERE id = '$update_p_id'") or die('Query failed!');
	
	$update_image = $_FILES['update_image']['name'];
	$update_image_tmp_name = $_FILES['update_image']['tmp_name'];
	$update_image_size = $_FILES['update_image']['size'];
	$update_folder = 'uploaded/'.$update_image;
	$update_old_image = $_POST['update_old_image'];
	
	if(!empty($update_image)) {
		if($update_image_size > 2000000) {
			$message[] ='Image file size is too large!';
		}else{
			mysqli_query($conn, "UPDATE shop_kids SET image = '$update_image' WHERE id = '$update_p_id'") or die('Query failed!');
			move_uploaded_file($update_image_tmp_name, $update_folder);
			unlink('uploaded/'.$update_old_image);
		}
	}
	
	
	header('location:admin_shopkids.php');
}
?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin-Products | Shop Kids</title>
	
	<!---cdn link for fonts--->
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	
	<!---custom css file--->
	
	<link rel="stylesheet" href="admin_styles.css">
	
	
	
	
</head>

<body>
	
	<?php
	
	include('admin_header.php');
	
	?>
	
	
<!--admin product CRUD system starts from here----->	
	
<section class="add-products">

   <h1 class="title">Shop Products</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Add KIDS Product</h3>
      <input type="text" name="name" class="formbox" placeholder="Enter product name" required>
      <input type="number" min="0" name="price" class="formbox" placeholder="Enter product price" required>
      <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
	  
      <input type="submit" value="add product" name="add_kidsproduct" class="btn">
   </form>
	
	

</section>

<!--admin product CRUD system ends here------>	
	
	
<!---show products---->	
	
<section class="show-products">
	
	
	<div class="box-container">
	
		<?php
	
		$select_kidsproducts = mysqli_query($conn, "SELECT * FROM `shop_kids`") or die('Query failed!');
		if(mysqli_num_rows($select_kidsproducts)>0){
			while($fetch_kidsproducts = mysqli_fetch_assoc($select_kidsproducts)) {
	?>
		<div class="box">
		
			<img src="uploaded/<?php echo $fetch_kidsproducts['image']; ?>" alt="">
			
			<div class="name"><?php echo $fetch_kidsproducts['image']; ?></div>
			<div class="price">LKR <?php echo $fetch_kidsproducts['price']; ?>/-</div>
			<a href="admin_shopkids.php?update=<?php echo $fetch_kidsproducts['id']; ?>" class="option-btn">Update</a>
			<a href="admin_shopkids.php?delete=<?php echo $fetch_kidsproducts['id']; ?>" class="delete-btn" onClick="return confirm('Are you certain you want to delete this product?');">Delete</a>
		</div>
		
		<?php
		}
			}else{
			echo('<p class="empty">No Products are added!</p>');
		}
		
		?>
		
		
	
	</div>
	
	
	
	
	</section>
	
	<section class="edit-product-form">
	
	<?php
		if(isset($_GET['update'])) {
			$update_id = $_GET['update'];
			$update_query = mysqli_query($conn, "SELECT * FROM `shop_kids` WHERE id = '$update_id'") or die('Query failed!');
			if(mysqli_num_rows($update_query) > 0){
				while($fetch_update = mysqli_fetch_assoc($update_query)){
					
		?>
		
		<form action="" method="post" enctype="multipart/form-data">
			
			<input type="hidden" name="update_p_id" value="<?php echo $fetch_update['id']; ?>">
		    <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['image']; ?>">
			<img src="uploaded/<?php echo $fetch_update['image']; ?>" alt="">
		    <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" class="formbox" required placeholder="Enter product name">
			<input type="number" name="update_price" value="<?php echo $fetch_update['price']; ?>" min="0" class="formbox" required placeholder="Enter product price">
			<input type="file" class="formbox" name="update_image" accept="image/jpg, image/jpeg, image/png">
			<input type="submit" value="Update" name="update_product" class="option-btn">
			<input type="reset" value="Cancel" id="close-update" class="delete-btn">
		</form>
		
		
		<?php
		
					}
			}
		}else{
			echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
		}
		
		?>
	
	</section>
	
<!--admin js file link------>
	
	<script src="admin_script.js"></script>	

</body>
</html>

