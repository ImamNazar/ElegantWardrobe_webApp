<?php

include('connection.php');

if(isset($_POST['submit'])) {
	
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, md5($_POST['password']));
	$cpassword = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
	
	$position = $_POST['position'];
	
	$select_position = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND password = '$password'") or die('Query failed!');
	
	if(mysqli_num_rows($select_position) > 0) {
		$message[] = 'User already exist!';
	} else{
		if($password != $cpassword) {
			$message[] = 'Password doesnot match!';
			
		} else {
			mysqli_query($conn, "INSERT INTO users"."(name, email, password, position)"."VALUES('$name', '$email', '$cpassword', '$position')") or die('Query failed');
			$message[] = 'Registered successfully!';
			header('location:login.php');
		}
	}
}

?>




<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register | .elegantWardrobe</title>
	
	<!---cdn link for fonts--->
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	
	<!---custom css file--->
	
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	
	
<!--notification function---->
	<?php
	
	if(isset($message)){
		foreach($message as $message) {
			
			echo('<div class="message">
	
	        <span>'.$message.'</span>
	        <i class="fas fa-times" onClick="this.parentElement.remove();"></i>
	
	        </div>');
		}
	}
	
	?>
	
	<div class="form-container">
	
	
		<form action="" method="post">
			<h3>REGISTER NOW</h3>
		
			<input type="text" name="name" placeholder="Enter your name" required class="formbox">
			
			<input type="text" name="email" placeholder="Enter your email" required class="formbox">
			
			<input type="password" name="password" placeholder="Enter your password" required class="formbox">
			
			<input type="password" name="cpassword" placeholder="Confirm your password" required class="formbox">
			
			<select name="position" id="" class="formbox">
				<option value="user">User</option>
				<option value="admin">Admin</option>
			</select>
			
			<input type="submit" name="submit" value="Register" class="btn">
			<p>Already have an account? <a href="login.php">Login</a></p>
	
		</form>
	
	</div>
	
</body>
</html>