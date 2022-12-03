<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['send'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $msg = mysqli_real_escape_string($conn, $_POST['message']);
    $image=mysqli_real_escape_string($conn,$_POST['image']);

    $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

    if(mysqli_num_rows($select_message) > 0){
        $message[] = 'message sent already!';
    }else{
        mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message,image) VALUES('$user_id', '$name', '$email', '$number', '$msg','$image')") or die('query failed');
        $message[] = 'report sent successfully!';
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>report</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php @include 'header.php'; ?>



<section class="contact">

    <form action="" method="POST">
        <h3>Report your problem!</h3>
        <input type="text" name="name" placeholder="Location" class="box" required> 
        <input type="date" name="email" placeholder="date" class="box" required>
        <input type="time" name="number" placeholder="time" class="box" required>
        
        <textarea name="message" class="box" placeholder="report your issue here" required cols="30" rows="10"></textarea>
        <input type="file" accept="image/jpg, image/jpeg, image/png" required class="box" name="image" >
        <div class="mb-3">
  
        
</div>
        <input type="submit" value="send message" name="send" class="btn">
    </form>

</section>






<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>