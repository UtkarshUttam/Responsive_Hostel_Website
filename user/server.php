<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$reg_no = "";
$mobile_no = "";
$room_no = "";
//variables for laundry page starts
$clothes_no = "";
$instruct = "";
//variables for laundry page ends
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'hostel_data');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $room_no = mysqli_real_escape_string($db, $_POST['room_no']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $reg_no = mysqli_real_escape_string($db, $_POST['reg_no']);
  $mobile_no = mysqli_real_escape_string($db, $_POST['mobile_no']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($reg_no)) { array_push($errors, "Registration number is required"); }
  if (empty($mobile_no)) { array_push($errors, "Mobile number is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if (empty($room_no)) { array_push($errors, "Alloted is required");}
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM userinfo WHERE username='$username' OR email_id='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO userinfo (Registration_No, Mobile_No, email_ID, username, password, Room) 
  			  VALUES( '$reg_no', '$mobile_no', '$email', '$username', '$password', '$room_no')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: profile.php');
  }
}
// LAUNDRY DATA 
if (isset($_POST['laundry_submit'])){
  $clothes_no = mysqli_real_escape_string($db, $_POST['Clothes_no']);
  $instruct = mysqli_real_escape_string($db, $_POST['Instruction']);
  $room_no1 = mysqli_real_escape_string($db, $POST['Room-Num']);
  if (empty($clothes_no)) {
  	array_push($errors, "No. of Clothes is required");
  }
  if (count($errors) == 0) {
  	// $password = md5($password_1);//encrypt the password before saving in the database
    $query = "SELECT Room FROM userinfo WHERE Registration_No='$reg_no' ";
  	$results = mysqli_query($db, $query);
  	if ($room_no1==$results) 
    {      
  	$query = "INSERT INTO laundry_table (Room, Clothes_no, Instruction)
  			  VALUES( '$room_no' ,'$clothes_no', '$instruct')";
  	mysqli_query($db, $query);
    }
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Your request has been sent!";
  	header('location: ../../user/index.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM userinfo WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: profile.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>