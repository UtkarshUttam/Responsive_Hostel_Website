<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../user/login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: ../user/login.php");
  }
  ?>
  <?php 
  $db = mysqli_connect('localhost', 'root', '', 'hostel_data'); 
  $Mobile= "SELECT Mobile_No FROM userinfo WHERE username= '$_SESSION[username]' LIMIT 1";
  $result = mysqli_query($db, $Mobile);
  $row['mobile'] = mysqli_fetch_assoc($result);
  ?>
  <?php 
  $db = mysqli_connect('localhost', 'root', '', 'hostel_data'); 
  $EMAIL= "SELECT email_ID FROM userinfo WHERE username= '$_SESSION[username]' LIMIT 1";
  $result = mysqli_query($db, $EMAIL);
  $row['email'] = mysqli_fetch_assoc($result);
  ?>
    <?php 
  $db = mysqli_connect('localhost', 'root', '', 'hostel_data'); 
  $regno= "SELECT Registration_No FROM userinfo WHERE username= '$_SESSION[username]' LIMIT 1";
  $result = mysqli_query($db, $regno);
  $row['regno'] = mysqli_fetch_assoc($result);
  ?>
  <?php
  $regno1 = implode($row['regno']);
  ?>
      <?php 
  $db = mysqli_connect('localhost', 'root', '', 'hostel_data'); 
  $room= "SELECT room FROM userinfo WHERE username= '$_SESSION[username]' LIMIT 1";
  $result = mysqli_query($db, $room);
  $row['room'] = mysqli_fetch_assoc($result);
  ?>
      <?php 

  $db1 = mysqli_connect('localhost', 'root', '', 'hostel_data'); 
  $Clothes= "SELECT Clothes_no FROM laundry_table WHERE Registration_No= '$regno1' LIMIT 1";
  $result = mysqli_query($db, $Clothes);
  // $row['laundry'] = mysqli_fetch_assoc($result)
  // if(mysqli_num_rows($result) == 0){
    $row['laundry'] = mysqli_num_rows($result) > 0 ? implode(mysqli_fetch_assoc($result)) : 'None'; 
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
    <body>
  <div class="wrapper">
    <div class="userBox">
      <div class="header">
        <p>Reg.no:  <?php echo implode($row['regno']) ?></p>
      </div>
      <span class="userPic"></span>
      <div class="middle">
        <div class="middleText"><br><br><br><br>
        <p class="tospecify"> <?php echo $_SESSION['username'] ?></p>
        <p class="specify">Name of the Student</p>
        <p class="tospecify"><?php echo implode($row['mobile']) ?></p>
        <p class="specify">MObile Number</p>
        <p class="tospecify"><?php echo implode($row['email']) ?></p>
        <p class="specify">Email ID of the Student</p>
        </div>
      </div>
      <div class="footer">
        <ul><br><br><br>
          <li><span><?php echo implode($row['room']) ?></span>Room No</li>
          <li><span><?php echo $row['laundry'] ?></span>most recent clothes sent to laundry</li>

          <!-- <li><span>1.2m</span>Followers</li>
          <li><span>62</span>Following</li> -->
        </ul>
      </div>
    </div>
  </div>
