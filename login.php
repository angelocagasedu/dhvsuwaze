<?php

include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $pass = $_POST['pass'];

   $select = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
   $select->execute([$email, $pass]);
   $row = $select->fetch(PDO::FETCH_ASSOC);

   if($select->rowCount() > 0){

      if($row['user_type'] == 'sadmin'){

         $_SESSION['sadmin_id'] = $row['id'];
         header('location:sadmin_page.php');

      }elseif($row['user_type'] == 'admin'){

         $_SESSION['admin_id'] = $row['id'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

      $_SESSION['user_id'] = $row['id'];
      header('location:user_page.php');

   }else{
         $message[] = 'no user found!';
      }
      
   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>DHVSU Waze</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
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
   
<section class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>dhvsu waze login</h3>
      <input type="email" required placeholder="enter your email" class="box" name="email">
      <input type="password" required placeholder="enter your password" class="box" name="pass">
      <input type="submit" value="login" class="btn" name="submit">
   </form>

</section>

</body>
</html>