<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:shop.php');
}
if(isset($_POST['add_to_wishlist'])){
 $product_name = $_POST['location'];
   $product_price = $_POST['time'];
   $product_image = $_POST['problem'];

   
   
       mysqli_query($conn, "INSERT INTO `wishlist`(user_id,  location, time, message) VALUES('$user_id',  '$product_name', '$product_price', '$product_image')") or die('query failed');
       $message[] = 'Thanks for voting:)';
   

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Aall reports</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/admin_style.css">
    
</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="messages">

   <h1 class="title">everyones reports</h1>

   <div class="box-container">

      <?php
       $select_message = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
       if(mysqli_num_rows($select_message) > 0){
          while($fetch_message = mysqli_fetch_assoc($select_message)){
      ?>
       <form action="" method="POST" class="box">
      <div class="box">
         <p>user id : <span><?php echo $fetch_message['user_id']; ?></span> </p>
         <p>Location : <span><?php echo $fetch_message['name']; ?></span> </p>
         <p>Time : <span><?php echo $fetch_message['number']; ?></span> </p>
         <p>Year : <span><?php echo $fetch_message['email']; ?></span> </p>
         <p>Problem : <span><?php echo $fetch_message['message']; ?></span> </p>
         <input type="hidden" name="location" value="<?php echo $fetch_message['name']; ?>">
         <input type="hidden" name="time" value="<?php echo $fetch_message['number']; ?>">
         
         <input type="hidden" name="problem" value="<?php echo $fetch_message['message']; ?>">
         <input type="submit" value="upvote" name="add_to_wishlist" class="option-btn">
          </form>
         
         
<?php if ($fetch_message['user_id']==$user_id ) { ?> 
    <a href="admin_contacts.php?delete=<?php echo $fetch_message['id']; ?>" onclick="return confirm('delete this message?');" class="delete-btn">delete</a>
<?php } ?>



           
         
         
         
       
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">you have no messages!</p>';
      }
      ?>
   </div>

</section>













<script src="js/admin_script.js"></script>

</body>
</html>