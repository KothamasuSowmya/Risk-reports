<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Votes</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="heading">
    <h3>upvotes</h3>
    <p> <a href="home.php">home</a> / reports </p>
</section>

<section class="shopping-cart">

    <h1 class="title"></h1>

    <div class="box-container">

    <?php
        $grand_total = 0;
        $select_cart = mysqli_query($conn, "SELECT * FROM `wishlist` ") or die('query failed');
        if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
    ?>
    <div  class="box">
        <div class="price"><p>user id : <span><?php echo $fetch_cart['user_id']; ?></span> </p></div>
        <div class="name"> <p>Location : <span><?php echo $fetch_cart['location']; ?></span> </p></div>
        <div class="name"> <p>Time : <span><?php echo $fetch_cart['time']; ?></span> </p></div>
      
        <div class="name"> <p>Problem : <span><?php echo $fetch_cart['message']; ?></span> </p></div>  
        
    </div>
    <?php
    
        }
    }else{
        echo '<p class="empty">No votes!!</p>';
    }
    ?>
    </div>

    

    

</section>






<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>