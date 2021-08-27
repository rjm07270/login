<?php
   include('config.php');
   session_start();

   /* Let's check to see if:
      1. the session has a logged in user
      2. the logged in user is in the database

    */


   /* if the user is not logged in or is not valid,
      redirect to the logout screen to clear out the session.
    */
	echo $hashedpassword;
    if(!isset($_SESSION['login_user'])){
      header("location: login.php");
    }else{
      $hashedpassword= password_hash($form_password, PASSWORD_DEFAULT);
      $username=$_SESSION['login_user'];
      $hashedpassword=$_SESSION['login_pass'];
      $sql="SELECT id FROM user_deets WHERE username='$username'AND passcode='$hashedpassword'";
      $conn->query($sql);
      $result = $conn->query($sql);
      if ($result->num_rows<1) {
        // code...
        header("location: login.php");
      }
    }
?>
