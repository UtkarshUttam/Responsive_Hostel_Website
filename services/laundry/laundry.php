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
  $db = mysqli_connect('localhost', 'root', '', 'hostel_data'); 
  $room= "SELECT room FROM userinfo WHERE username= '$_SESSION[username]' LIMIT 1";
  $result = mysqli_query($db, $room);
  $row['room'] = mysqli_fetch_assoc($result);
  ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Complain</title>
</head>

<body class="laundrybody">
    <nav class="navbar nav-dark">
        <ul class="nav-list">
            <div class="logo"><img src="../../media/logo.png" alt="logo"
                    style="border:3px solid white; border-radius:50px">
            </div>
            <li><a href="../../home.html">Home</a></li>
            <li><a href="../../about.html">About</a></li>
            <li><a href="../../services/services.php">Services</a></li>
            <li><a href="../../contact.html">Contact Us</a></li>
        </ul>
        <div class="rightNav">
            <input type="text" name="search" id="search" placeholder="Hola!">
            <button class="` btn-sm">Search</button>
        </div>
    </nav>
    <link rel="stylesheet" href="./laundry.css">
    <section>
        <div id="container">
            <header>Register for Laundry </header>
            <form method="post">
                <fieldset>
                    <br />
                    <p><?php echo implode($row['room']) ?></p>
                    <!-- <input type="text" name="Room-Num" id="Room-Num" placeholder="Your Room Number" required> -->
                    <br /><br /><br><br>
                    <input type="text" name="Cloth-num" id="Clothe-num" placeholder="Number of clothes" required>
                    <br /><br /><br><br>
                    <input type="text" name="Instructions" id="Instructions" placeholder="Instructions if any.">
                    <br /><br /><br>
                    <label for="submit"></label>
                    <input type="submit" name="submit" id="submit" value="REGISTER">
                </fieldset>
            </form>
        </div>
    </section>
</body>

</html>