<?php

include('connection.php');

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)) {
	header('location:login.php');
};

if(isset($_GET['delete'])) {
	$delete_id = $_GET['delete'];
	mysqli_query($conn, "DELETE FROM `message` WHERE id = '$delete_id'") or die('Query failed!');
	header('location:admin_contacts.php');
}

?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin-Contacts</title>
	
	<!---cdn link for fonts--->
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	
	<!---custom css file--->
	
	<link rel="stylesheet" href="admin_styles.css">
	
	
	
	
</head>

<body>
	
	<?php
	
	include('admin_header.php');
	
	?>
	
<section class="messages">
	
	<h1 class="title">Messages and Feedbacks</h1>
	
	
	<div class="box-container">
	<?php
		
		$select_message = mysqli_query($conn, "SELECT * FROM `message`") or die('Query failed!');
		if(mysqli_num_rows($select_message) > 0) {
			while($fetch_message = mysqli_fetch_assoc($select_message)) {
		
			
		
	?>
	<div class="box">
		
		<p>Name : <span><?php echo $fetch_message['name'];?></span></p>
		<p>Email : <span><?php echo $fetch_message['email'];?></span></p>
		<p>Phone Number : <span><?php echo $fetch_message['number'];?></span></p>
		<p>Message/Feedback : <span><?php echo $fetch_message['message'];?></span></p>
		<a href="admin_contacts.php?delete=<?php echo $fetch_message['id']; ?>" onClick="return confirm('Are you certain you want to delete this message/feedback?');" class="delete-btn">Delete Message</a>
	</div>	
	<?php
	};
			
	}else{
			echo('<p class="empty">You have no messages or feedbacks!</p>');
		}
	?>
    </div>
	
</section>
	
	
	
	
	
	
	<!--admin js file link------>
	
	<script src="admin_script.js"></script>

</body>
</html>