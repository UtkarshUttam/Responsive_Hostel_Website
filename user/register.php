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
            <li><a href="../services/services.html">Services</a></li>
            <li><a href="../contact.html">Contact Us</a></li>
        </ul>
        <div class="rightNav">
            <input type="text" name="search" id="search" placeholder="Hola!">
            <button class="btn btn-sm">Search</button>
        </div>
    </nav>
<section class="login-background">
	<div class="login-box">
		<h2>Register</h2>
		<form method="post" action="register.php">
			<?php include('errors.php'); ?>
			<div class="user-box">
				<input type="text" name="room_no" value="<?php echo $room_no; ?>">
				<label>Alloted Room Number</label>
			</div>
			<div class="user-box">
				<input type="text" name="reg_no" value="<?php echo $reg_no; ?>">
				<label>Registration Number</label>
			</div>
			<div class="user-box">
				<input type="text" name="mobile_no" value="<?php echo $mobile_no; ?>">
				<label>Mobile Number</label>
			</div>
			<div class="user-box">
				<input type="text" name="email" value="<?php echo $email; ?>">
				<label>Email</label>
			</div>
			<div class="user-box">
				<input type="text" name="username" value="<?php echo $username; ?>">
				<label>Username</label>
			</div>
			<div class="user-box">
				<input type="password" name="password_1">
				<label>Password</label>
			</div>
			<div class="user-box">
				<input type="password" name="password_2">
				<label>Confirm password</label>
			</div>
			<div>
				<button type="submit" class="btn11" name="reg_user">submit</button>
			</div>
  	<p style="color:white;">
  		Already a member? <a href="login.php" style="text-decoration: none; color: coral;">Sign in</a>
  	</p>
  </form>
</body>
</html>