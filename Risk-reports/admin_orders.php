<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_POST['update_order'])){
   $order_id = $_POST['order_id'];
   $update_payment = $_POST['update_payment'];
   mysqli_query($conn, "UPDATE `message` SET payment_status = '$update_payment' WHERE id = '$order_id'") or die('query failed');
   $message[] = 'Report status has been updated !';
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `orders` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_orders.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>dashboard</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
   
<?php @include 'admin_header.php'; ?>

<section class="placed-orders">

   <h1 class="title">Reports from people</h1>

   <div class="box-container">

      <?php
      
      $select_orders = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
      if(mysqli_num_rows($select_orders) > 0){
         while($fetch_orders = mysqli_fetch_assoc($select_orders)){
      ?>
      <div class="box">
         <p> user id : <span><?php echo $fetch_orders['user_id']; ?></span> </p>
        
         <p> Name : <span><?php echo $fetch_orders['name']; ?></span> </p>
         <p> Time : <span><?php echo $fetch_orders['number']; ?></span> </p>
         <p> Year: <span><?php echo $fetch_orders['email']; ?></span> </p>
         <p> Issue reported: <span><?php echo $fetch_orders['message']; ?></span> </p>
         
         <form action="" method="post">
            <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
            <select name="update_payment">
               <option  disabled selected><?php echo " status"; ?></option>
               <option value="Submitted to newspaper">Submitted to newspaper</option>
               <option value="Resolved">Resolved</option>
               <option value="No action taken">No action taken</option>
            </select>
            <input type="submit" name="update_order" value="update" class="option-btn">
           
    <a href="admin_contacts.php?delete=<?php echo $fetch_orders['id']; ?>" onclick="return confirm('delete this message?');" class="delete-btn">delete</a>


            
         </form>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">No reports from people yet!</p>';
      }
      ?>
   </div>

</section>













<script src="js/admin_script.js"></script>

</body>
</html>