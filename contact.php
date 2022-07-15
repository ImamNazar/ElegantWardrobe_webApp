
<?php

include('connection.php');

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)) {
	header('location:login.php');
}

if(isset($_POST['send'])){
	
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$number = $_POST['number'];
	$msg = mysqli_real_escape_string($conn, $_POST['message']);
	
	
	$select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name ='$name' AND email = '$email' AND number ='$number' AND message = '$msg'") or die('Query failed!');
	
	
	if(mysqli_num_rows($select_message) > 0) {
		$message[] = 'Message has been sent already!';
	}else{
		mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('Query failed!');
		$message[] = 'Message sent successfully';
	}
}

?>







<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Contact us | .elegantWardrobe</title>
	
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	
	<!---custom css file--->
	
	<link rel="stylesheet" href="styles.css">
	
	
	
	
</head>

<body>
	
	<?php include('header.php'); ?>
	
	
	<div class="heading">
	
			<h3>Contact Us</h3>
			<p><a href="home.php">Home</a> / .elegantWardrobe</p>
			
		</div>
	
	
	<section class="contact">
	
		
		<form action="" method="post">
			<h3>Help Us Improve.</h3>
		
			<input type="text" name="name" required placeholder="Enter your name" class="formbox">
			<input type="email" name="email" required placeholder="Enter your email" class="formbox">
			<input type="number" name="number" required placeholder="Enter your phone number" class="formbox">
			<textarea name="message" id="" cols="30" rows="10" placeholder="Type in your message" class="formbox"></textarea>
			<input type="submit" value="Send Message" name="send" class="btn">
			
			
		<h3>WE'D LOVE TO HEAR FROM YOU!</h3>
			
		</form>
		
	</section>
	
	
	
	
	
	
	
	
	
	
	<?php include('footer.php'); ?>
	
	
	
	<!--admin js file link------>
	
	<script src="script.js"></script>
	
</body>
</html>