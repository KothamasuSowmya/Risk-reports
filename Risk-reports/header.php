<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

    <div class="flex">

        <a href="home.php" class="logo">Risk reports</a>

        <nav class="navbar">
            <ul>
                <li><a href="home.php">home</a></li>
              
                   
                        <li><a href="contact.php">Report prolem</a></li>
                   
               
                <li><a href="shop.php">All reports</a></li>
                <li><a href="orders.php">Status</a></li>
                <li><a href="#">accounts +</a>
                    <ul>
                        <li><a href="login.php">login</a></li>
                        <li><a href="register.php">register</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            
            <div id="user-btn" class="fas fa-user"></div>
            
            
            
           <a href="cart.php"><i class="fas fa-thumbs-up"></i><span><?php echo $cart_num_rows; ?></span></a>
        </div>

        <div class="account-box">
            <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="logout.php" class="delete-btn">logout</a>
        </div>

    </div>

</header>