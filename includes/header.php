<?php
  session_start();
  //if user isin login session then user will be logged in 
  if(!isset($_SESSION['id'])){
    header("location: login.php");
    exit();
  }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram-Clone</title>
    <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <link  href="assets/css/style.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>
<body>
    <!--Navigation-->
    <nav class="navbar">
        <div class="nav-wrapper">
            <img class="brand-img" src="assets/images/logo.png" style="height: 40px; margin-bottom: 5px; ">
                <form action="search_post.php" method="post" class="search-form">
                    <input type="text" class="search-box" placeholder="search..." name="search_input">
                </form>
            <div class="nav-items">
                <a href="index.php" style="color:#000;">
                    <i class="icon fa-solid fa-house"></i>
                </a>
                <a href="discover.php" style="color:#000;">
                    <i class="icon fa-solid fa-plus"></i>
                </a>
                <a href="liked_post.php" style="color:#000;">
                    <i class="icon fa-solid fa-heart"></i>
                </a>
                <div class="icon user-profile">
                    <a href="profile.php"  style="color:#000;">
                        <i class=" fa-solid fa-user"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>