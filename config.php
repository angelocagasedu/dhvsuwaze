<?php

$db_name = "mysql:host=localhost;dbname=dwaze";
$username = "root";
$password = "";

try {

$conn = new PDO($db_name, $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Connected successfully";
} catch(PDOException $e) {
echo "Connection failed: " . $e->getMessage();
}
?>