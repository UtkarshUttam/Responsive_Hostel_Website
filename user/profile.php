<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../user/login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
  ?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/CSS" href="../css/profile.css" />
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
<nav class="navbar nav-dark">
        <ul class="nav-list">
            <div class="logo"><img src="../media/logo.png" alt="logo" style="border:3px solid white; border-radius:50px">
            </div>
            <li><a href="../home.html">Home</a></li>
            <li><a href="../about.html">About</a></li>
            <li><a href="../services/services.php">Services</a></li>
            <li><a href="../contact.html">Contact Us</a></li>
        </ul>
        <div class="rightNav">
            <input type="text" name="search" id="search" placeholder="Hola!">
            <button class="btn btn-sm">Search</button>
        </div>
    </nav>
  <div class="portfoliocard">
    <div class="coverphoto"></div>
    <div class="profile_picture"></div>
    <div class="left_col">
      <div class="followers">
        <div class="follow_count">*******</div>
        Degree
      </div>
      <div class="following">
        <div class="follow_count">*******</div>
        Course
      </div>
    </div>
    <div class="right_col">
    <?php  isset($_SESSION['username'])  ?>
      <h2 class="name"><?php echo $_SESSION['username']; unset($_SESSION['success']); ?></h2>
      <h3 class="location">Name of the Student</h3>
      <ul class="contact_information">
        <li class="work">*age*</li>
        <li class="website">*Roomno*</li>
        <li class="mail"></li>
        <li class="phone">1-(732)-757-2923</li>
        <li class="resume"><a href="#" class="nostyle">download resume</a></li>
      </ul>
    </div>
  </div>
</body>
</html>
