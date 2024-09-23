<?php
include "config.php";
$pages = basename($_SERVER['PHP_SELF']);
switch ($pages) {
    case 'single.php':
        if (isset($_GET['id'])) {
            $sql_title = "SELECT * FROM post WHERE post_id = {$_GET['id']}";
            $result_title = mysqli_query($conn, $sql_title) or die('Query Not Found: single record');
            $row_title = mysqli_fetch_assoc($result_title);
            $page_title = $row_title['title'] ." record";
        }else {
            $page_title = "No title found";
        }
        break;
    case 'author.php':
        if (isset($_GET['aid'])) {
            $sql_title = "SELECT * FROM user WHERE user_id = {$_GET['aid']}";
            $result_title = mysqli_query($conn, $sql_title) or die('Query Not Found: author record');
            $row_title = mysqli_fetch_assoc($result_title);
            $page_title = $row_title['first_name'] . " " . $row_title['last_name'] ." record";
        }else {
            $page_title = "No title found";
        }
        break;
    case 'category.php':
        if (isset($_GET['cid'])) {
            $sql_title = "SELECT * FROM category WHERE category_id = {$_GET['cid']}";
            $result_title = mysqli_query($conn, $sql_title) or die('Query Not Found: category record');
            $row_title = mysqli_fetch_assoc($result_title);
            $page_title = $row_title['category_name'] ." record";
        }else {
            $page_title = "No title found";
        }
        break;
    case 'search.php':
        if (isset($_GET['search'])) {
            $page_title = $_GET['search'] ." record";
        }else {
            $page_title = "No title found";
        }
        break;
    default:
        $page_title = "news-side";
        break;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $page_title; ?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
                <a href="index.php" id="logo"><img src="images/news.jpg"></a>
            </div>
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                include "config.php";
                $home = "http://localhost/news-template";
                if(isset($_GET['cid'])){
                    $cat_id = $_GET['cid'];
                }
                $sql = "SELECT * FROM category WHERE post > 0";
                $result = mysqli_query($conn, $sql) or die("Query faild: category");
                if (mysqli_num_rows($result) > 0) {
                    $active = "";
                    echo"<ul class='menu'>";
                    echo "<li><a href='$home'>Home</a></li>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        if(isset($_GET['cid'])){
                            if ($row['category_id'] == $cat_id) {
                                $active = "active";
                            }else{
                                $active = "";
                            }
                        }
                        echo "<li><a class='{$active}' href='category.php?cid={$row['category_id']}'>{$row['category_name']}</a></li>";
                    }
                    echo "</ul>"; 
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->
