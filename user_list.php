($row['user_type'] == 'sadmin'){

$_SESSION['sadmin_id'] = $row['id'];
header('location:sadmin_page.php');

}else<?php

include 'config.php';

session_start();

$sadmin_id = $_SESSION['sadmin_id'];

if(!isset($sadmin_id)){
header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
    </head>
<body>
<div class="form-container">
    <?php
        $sql = "SELECT * FROM `users`;";
        $result = $conn->prepare($sql);
        $result->execute();

        if($result->rowCount() > 0) {
            echo '<table class="table">';
            echo "<thead>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Name</th>";
            echo "<th>Email</th>";
            echo "<th>Password</th>";
            echo "<th>User Type</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "<td>" . $row['user_type'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        } else {
            echo "No Users";
        }
        ?>
        </div>

    <a href="register.php" class="delete-btn">Register New User</a>






</body>
</html>
