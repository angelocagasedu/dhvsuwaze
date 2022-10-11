($row['user_type'] == 'admin'){

$_SESSION['admin_id'] = $row['id'];
header('location:admin_page.php');

}else<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>admin page</title>

<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="css/style.css">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #800000;
  color: white;
}
</style>
</head>
<body>

<div class="topnav">
  <a>DHVSU Waze</a>
  <a class="active" href="#home">Profile</a>
  <a href="#news">Dashboard</a>
  <a href="user_list.php">Users</a>
  <a href="#about">About</a>
</div>  
</head>
<body>

<h1 class="title"> <span>admin</span> profile page </h1>

<section class="profile-container">

<?php
$select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
$select_profile->execute([$admin_id]);
$fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
?>

<div class="profile">
<img src=./image/Admin.png>
<h3><?= $fetch_profile['name']; ?></h3>
<a href="admin_profile_update.php" class="btn">update profile</a>
<a href="logout.php" class="delete-btn">logout</a>
</div>

</section>

</body>
</html>