<?php 
$hostName    = "localhost";
$userName    = "root";
$password    = "";
$dbName      = "news-site";
?>

<?php
$conn = new mysqli($hostName, $userName, $password, $dbName) or die('Connection Faild: ' . mysqli_connect_errno());
?>