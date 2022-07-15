<?php

include('connection.php');

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)) {
	header('location:login.php');
}

if(isset($_GET['delete'])) {
	$delete_id = $_GET['delete'];
	mysqli_query($conn, "DELETE FROM `users` WHERE id = '$delete_id'") or die('Query failed!');
	header('location:admin_users.php');
}

?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin-Users</title>
	
	<!---cdn link for fonts--->
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	
	<!---custom css file--->
	
	<link rel="stylesheet" href="admin_styles.css">
	
	
	
	
</head>

<body>
	
	<?php
	
	include('admin_header.php');
	
	?>
	
	
<section class="users">

	<h1 class="title">Accounts</h1>

	<div class="box-container">

		<?php
		
		$select_users = mysqli_query($conn, "SELECT * FROM `users`") or die('Query failed!');
		while($fetch_users = mysqli_fetch_assoc($select_users)) {
			
		
		?>
		
		<div class="box">

		<p>Username : <span><?php echo $fetch_users['name']; ?></span></p>
			
		<p>Email : <span><?php echo $fetch_users['email']; ?></span></p>
			
		<p>Position : <span style="color: <?php if($fetch_users['position'] == 'admin'){ echo 'red'; }?>"><?php echo $fetch_users['position']; ?></span></p>
			
		<a href="admin_users.php?delete=<?php echo $fetch_users['id']; ?>" onClick="return confirm('Are you certain you want to delete this account?');" class="delete-btn">Delete Account</a>
		</div>
		
		<?php
		};
		?>
	</div>
</section>
	
	
	
	
	
	<!--admin js file link------>
	
	<script src="admin_script.js"></script>
	
	

</body>
</html>