<?php 
include 'config.php';
 if ($_SESSION['user_role'] == 0 ) {
  header("Location:http://localhost/news-template/admin/post.php");
}

$user_id = $_GET['id'];

$sql = "DELETE FROM user WHERE user_id = $user_id";

if (mysqli_query($conn, $sql)) {
	header("Location: http://localhost/news-template/admin/users.php");
}else{
	echo "<h2>User not delete successfully!!!</h2>";
}

mysqli_close($conn);

?>