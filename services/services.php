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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="services.css">
    <script src="https://kit.fontawesome.com/781a8475c3.js" crossorigin="anonymous"></script>
    <title>Services Page</title>
</head>

<body class="services-body-bg">
    <nav class="navbar nav-dark">
        <ul class="nav-list">
            <div class="logo"><img src="../media/logo.png" alt="logo" style="border:3px solid white; border-radius:50px">
            </div>
            <li><a href="../home.html">Home</a></li>
            <li><a href="../about.html">About</a></li>
            <li><a href="services.html">Services</a></li>
            <li><a href="../contact.html">Contact Us</a></li>
        </ul>
        <div class="rightNav">
            <input type="text" name="'Search" id="search" placeholder="Hola!">
            <button class="btn btn-sm">Search</button>
            <div class="dropdown">
                <button class="btn dropbtn"><img src="../media/user.png" alt="profile-icon" width="30" height="30"></button>
                <div class="dropdown-content">
                    <a href="../user/profile.php">Profile Page</a>
                    <a href="../user/index.php?logout='1'">Sign Out</a>
        
                </div>
            </div>
            <!-- <button class="btn btn-sm profile-icon"><a href="/login_page.html"><img src="/media/user.png" alt="profile-icon" width="30" height="30"></button></a> -->
        </div>
        
    </nav>
    
    <div class="s2">
        <section>
            <div class="row">
                <h1 class="s1"></h1>
            </div>
            <div class="row">
                <div class="column">
                    <div class="card">
                        <a href="../room/room.html">
                        <div class="icon-wrapper">
                            <i class="fa-solid fa-person-digging"></i>
                        </div>
                        <h3>Room service</h3>
                        <p>Wikipedia is hosted by the Wikimedia Foundation,a non-profit organization <br> also hosts a
                            range of other projects.</p>
                        </a>
                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <a href="./laundry/laundry.php">
                        <div class="icon-wrapper">
                            <i class="fa-solid fa-shirt"></i>
                        </div>
                        <h3>Laundry</h3>
                        <p>Wikipedia is hosted by the Wikimedia Foundation,a non-profit organization <br> also hosts a
                            range of other projects.</p>
                        </a>
                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <a href="../services/gym/gym.html">
                        <div class="icon-wrapper">
                            <i class="fa-solid fa-dumbbell"></i>
                        </div>
                        <h3>Gym service</h3>
                        <p>Wikipedia is hosted by the Wikimedia Foundation,a non-profit organization <br> also hosts a
                            range of other projects.</p>
                        </a>
                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <div class="icon-wrapper">
                            <i class="fa-solid fa-house-medical"></i>
                        </div>
                        <h3>Doctor's appointment</h3>
                        <p>Wikipedia is hosted by the Wikimedia Foundation,a non-profit organization <br> also hosts a
                            range of other projects.</p>
                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <div class="icon-wrapper">
                            <i class="fa-solid fa-calendar"></i>
                        </div>
                        <h3>Notice & Event</h3>
                        <p>Wikipedia is hosted by the Wikimedia Foundation,a non-profit organization <br> also hosts a
                            range of other projects.</p>
                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <a href="../complain/complain.html">
                        <div class="icon-wrapper">
                            <i class="fa-solid fa-comment"></i>
                        </div>
                        <h3>Complain</h3>
                        <p>Wikipedia is hosted by the Wikimedia Foundation,a non-profit organization <br> also hosts a
                            range of other projects.</p>
                        </a>
                    </div>
                </div>
            </div>
            <i class="fa-thin fa-dryer"></i>
        </section>
    </div>

</body>

</html>