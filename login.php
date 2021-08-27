<?php
   include("config.php");
   session_start();

   /* if the user submitted form entries,
      1. Retrieve the username and password from the form.
      2. Query the database with that username.
      3. Check to see if
         a. ONE result was returned
         b. the password matches the stored hash
      4. if so, set session user and redirect to index
         if not, display message.
    */

    if ($_SERVER["REQUEST_METHOD"]=="POST"){

        $form_username = mysqli_real_escape_string($conn, $_POST['username']);
        $form_password = mysqli_real_escape_string($conn, $_POST['password']);

        $sql="SELECT passcode FROM user_deets WHERE username='$form_username'";
        $conn->query($sql);
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        if(($result->num_rows ==1)&& (password_verify($form_password,$row['passcode']))){
          $_SESSION['login_user'] = $form_username;
          $_SESSION['login_pass'] = $row['passcode'];
          header("location: index.php");
        } else{
          $error + "Your Username or Password is invalid";
        }
    }
?>

<html>

<head>
  <title>Login Page</title>
  <style>
    @import url(css/style.css);
  </style>
</head>

<body>
  <div class="center">
    <div class="title"><b>Login</b></div>
    <div class="paddedbox">
      <form action="" method="post">
        <label for="username">Username : </label><input type="text" name="username" class="box" /><br /><br />
        <label for="password">Password : </label><input type="password" name="password" class="box" /><br /><br />
        <input type="submit" value=" Login " />
      </form>
      <a href="create.php">Create Account</a><br />
      <div class="error"><?php echo $error; ?></div>
    </div>
  </div>
</body>

</html>
