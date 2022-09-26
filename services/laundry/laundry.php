<?php include('../../user/server.php');


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
  	$query = "INSERT INTO laundry_table (Room, Clothes_no, Instruction) 
      VALUES( '$room_no', '$clothes_no', '$instruct')";
mysqli_query($db, $query);?>
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
                    <input type="text" name="Room-Num" id="Room-Num" placeholder="Your Room Number" required value="<?php echo $room_no ?>">
                    <br /><br /><br><br>
                    <input type="text" name="Clothes_no" id="Clothes_no" placeholder="Number of clothes" required value="<?php echo $clothes_no ?>">
                    <br /><br /><br><br>
                    <input type="text" name="Instruction" id="Instruction" placeholder="Instructions if any." value="<?php echo $instruct ?>">
                    <br /><br /><br>
                    <label for="submit"></label>
                    <input type="submit" name="laundry_submit" id="submit" value="REGISTER">
                </fieldset>
            </form>
        </div>
    </section>
</body>

</html>