<?php

include('connection.php');

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)) {
	header('location:login.php');
}

?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Page/Panel | .elegantWardrobe</title>
	
	<!---cdn link for fonts--->
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	
	<!---custom css file--->
	
	<link rel="stylesheet" href="admin_styles.css">
	
	
	
	
</head>

<body>
	
	<?php
	
	include('admin_header.php');
	
	?>
	
	
<!--admin dashboard section starts from here------>	
	
	<section class="dashboard">
	
		<h1 class="title">Dashboard</h1>
		
		<div class="box-container">
			
			<div class="box">
			
			
		
			<?php
			
			$total_pendings = 0;
			$select_pending = mysqli_query($conn, "SELECT total_price FROM orders WHERE payment_status = 'pending'") or die('Query failed!');
			if(mysqli_num_rows($select_pending) > 0) {
				
				while($fetch_pendings = mysqli_fetch_assoc($select_pending)) {
				$total_price = $fetch_pendings['total_price'];
				$total_pendings += $total_price;
				} ;
			
			}
			
			?>
			
		    <h3>LKR <?php echo $total_pendings;?>/-</h3>
			<p>Total Pendings</p>
				
			</div>
			
			<div class="box">
			
			
		
			<?php
			
			$total_completed = 0;
			$select_completed = mysqli_query($conn, "SELECT total_price FROM orders WHERE payment_status = 'completed'") or die('Query failed!');
			if(mysqli_num_rows($select_completed) > 0) {
				
				while($fetch_completed = mysqli_fetch_assoc($select_completed)) {
				$total_price = $fetch_completed['total_price'];
				$total_completed += $total_price;
				} ;
			
			}
			
			?>
			
		    <h3>LKR <?php echo $total_completed;?>/-</h3>
			<p>Completed payments</p>
				
			</div>
			
			<div class="box">
			
			<?php
				
			$select_orders = mysqli_query($conn, "SELECT * FROM orders") or die('Query failed!');
			$number_of_orders=mysqli_num_rows($select_orders);
			?>
			<h3><?php echo $number_of_orders; ?></h3>	
			
			<p>Order Placed</p>
			</div>
			
			<div class="box">
			
			<?php
				
			$select_menproducts = mysqli_query($conn, "SELECT * FROM shop_men") or die('Query failed!');
			$number_of_menproducts=mysqli_num_rows($select_menproducts);
			?>
			<h3><?php echo $number_of_menproducts; ?></h3>	
			
			<p>MEN Products Added</p>
			</div>
			
			<div class="box">
			
			<?php
				
			$select_womenproducts = mysqli_query($conn, "SELECT * FROM shop_women") or die('Query failed!');
			$number_of_womenproducts=mysqli_num_rows($select_womenproducts);
			?>
			<h3><?php echo $number_of_womenproducts; ?></h3>	
			
			<p>WOMEN Products Added</p>
			</div>
			
			<div class="box">
			
			<?php
				
			$select_kidsproducts = mysqli_query($conn, "SELECT * FROM shop_kids") or die('Query failed!');
			$number_of_kidsproducts=mysqli_num_rows($select_kidsproducts);
			?>
			<h3><?php echo $number_of_kidsproducts; ?></h3>	
			
			<p>KIDS Products Added</p>
			</div>
			
			<div class="box">
			
			<?php
				
			$select_users = mysqli_query($conn, "SELECT * FROM users WHERE position = 'user'") or die('Query failed!');
			$number_of_users=mysqli_num_rows($select_users);
			?>
			<h3><?php echo $number_of_users; ?></h3>	
			
			<p>Users</p>
			</div>
			
			<div class="box">
			
			<?php
				
			$select_admins = mysqli_query($conn, "SELECT * FROM users WHERE position = 'admin'") or die('Query failed!');
			$number_of_admins=mysqli_num_rows($select_admins);
			?>
			<h3><?php echo $number_of_admins; ?></h3>	
			
			<p>Admin Users</p>
			</div>
			
			<div class="box">
			
			<?php
				
			$select_account = mysqli_query($conn, "SELECT * FROM users") or die('Query failed!');
			$number_of_account=mysqli_num_rows($select_account);
			?>
			<h3><?php echo $number_of_account; ?></h3>	
			
			<p>Overall Users</p>
			</div>
			
				<div class="box">
			
			<?php
				
			$select_messages = mysqli_query($conn, "SELECT * FROM message") or die('Query failed!');
			$number_of_messages=mysqli_num_rows($select_messages);
			?>
			<h3><?php echo $number_of_messages; ?></h3>	
			
			<p>New Messages</p>
			</div>
			
			<?php
			
			
			
			?>
		
		</div>
	
	</section>
	

<!--admin dashboard section ends here------>	
	
	
	
	
	<!--admin js file link------>
	
	<script src="admin_script.js"></script>
	
	
	

</body>
</html>