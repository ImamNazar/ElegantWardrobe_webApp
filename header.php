<?php


if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>';
   }
}


/*<div class="user-box">
         <p>Username : <span><?php echo $_SESSION['user_name']; ?></span></p>
         <p>Email : <span><?php echo $_SESSION['user_email']; ?></span></p>
         <a href="logout.php" class="delete-btn">Logout</a>
		<div>New <a href="login.php">login</a> | <a href="register.php">register</a></div>
      </div> -comes after icons div*/



?>



<header class="header">

   <div class="header-1">
      <div class="flex">
         <div class="share">
            <a href="https://www.facebook.com/" class="fab fa-facebook-f"></a>
            <a href="https://www.twitter.com/" class="fab fa-twitter"></a>
            <a href="https://www.instagram.com/" class="fab fa-instagram"></a>
            <a href="https://www.linkedin.com/" class="fab fa-linkedin"></a>
         </div>
         <p><a href="login.php">Login</a> | <a href="register.php">Register</a> </p>
      </div>
   </div>

   <div class="header-2">
      <div class="flex">
         <a href="home.php" class="logo">elegantWardrobe.</a>

         <nav class="navbar">
            <a href="home.php">home</a>
            <a href="about.php">about us</a>
            <a href="shopmen.php">shop men</a>
			 <a href="shopwomen.php">shop women</a>
			 <a href="shopkids.php">shop kids</a>
            <a href="contact.php">contact us</a>
            <a href="orders.php">orders</a>
         </nav>

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="search_page.php" class="fas fa-search"></a>
            <a href="logout.php"><div id="user-btn" class="fas fa-user"></div></a>
			 
			 <?php
			 	$select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('Query failed!');
			 	$cart_rows_number = mysqli_num_rows($select_cart_number);
			 ?>
            
            <a href="cart.php" id="cart-btn"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a>
         </div>

      </div>
   </div>

</header>