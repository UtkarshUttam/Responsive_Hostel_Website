<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="../css/login_page_style.css">
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
<section class="login-background">
<div class="login-box">
        <h2>Login</h2>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="user-box">
        <input type="text" name="username" required="">
        <label>Username</label>
    </div>
	<div class="user-box">
        <input type="password" name="password" required="">
        <label>Password</label>
    </div>
  	<div>
  		<button type="submit" class="btn11" name="login_user">submit</button>
  	</div>
  	<p style="color:white;">
  		Not yet a member? <a href="register.php" style="text-decoration: none; color: coral;">Sign up</a>
  	</p>
  </form>
</div>
</section>
</body>
</html>