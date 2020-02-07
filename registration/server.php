<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$type     ="student";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  
  $code = substr(md5(mt_rand()),0,15);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
 
  

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
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

    //$query = "INSERT INTO users (username, email, usertype,code) 
          //VALUES('$username', '$email','$type','$code')";
    //mysqli_query($db, $query);



    $message = "Your Activation Code is ".$code."";
    $to=$email;
    $subject="Activation Code For Online Exam";
    $from = 'mustafizneub@gmail.com';
    $body='Your Activation Code is '.$code.' Please Click On This link <a href="verify.php"</a>to activate your account.';
    $headers = "From:".$from;
    if(mail($to,$subject,$body,$headers)){
    	echo "mail send";
    }
    else
    	echo"failed";
	
	echo "An Activation Code Is Sent To You Check You Emails";
    //$_SESSION['username'] = $username;
    //$_SESSION['success'] = "You are succesfully registered.";
    //header('location:verify.php');
    //if($type === 'student') {header('location: home.php');}
    //if($type ==='admin') {header('location: admin.php');}
    //if($type ==='teacher') {header('location: teacher.php');}
  }
  else {
  	array_push($errors, "Wrong username/password combination");
  }
}


if (isset($_POST['verify_user'])) {
	$emai1 = mysql_real_escape_string($db, $_POST['email']);
	$code1 = mysql_real_escape_string($db, $_POST['email']);
	if (empty($email)) {
      array_push($errors, "email is required");
    }
    if (empty($code)) {
      array_push($errors, "Verification code is required");
    }
    if($emai1!=$email){
    	array_push($errors, "email address does not match");
    }
    if($code1!=$code){
    	array_push($errors, "email address does not match");
    }
    if (count($errors) == 0) {
   
      $_SESSION['success'] = "You are succesfully varified.";
      header('location: set_password.php');
    }


    else {
      array_push($errors, "User varification failed");
    }
  }


if (isset($_POST['set_password'])) {
	
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    if (empty($password_1)) {
    	array_push($errors, "password_1 is required");
    }
    if (empty($password_2)) {
     array_push($errors, "Password_2 is required"); 
 }
    if ($password_1 != $password_2) {
       array_push($errors, "The two passwords do not match");
 }
    if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database

     $query = "INSERT INTO users (username, email, usertype,password) 
          VALUES('$username', '$email','$type','$password')";
    mysqli_query($db, $query);
    $_SESSION['success'] = "You are succesfully logged in.";
    header('location: student.php');
}
   else {
      array_push($errors, "Varification failed");
    }
}
// ... 
// ... 

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $type = mysqli_real_escape_string($db, $_POST['usertype']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }
  if (empty($type)) {
    array_push($errors, "usertype is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password' AND usertype='$type'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1 && $type == 'student') {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: student.php');
    }
    if (mysqli_num_rows($results) == 1 && $type == 'admin') {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: admin.php');
    }
    if (mysqli_num_rows($results) == 1 && $type == 'teacher') {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: teacher.php');
    }


    else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}
//login admin

?>