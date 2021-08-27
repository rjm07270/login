<?php
   include("config.php");
   session_start();

  /* if the user submitted form entries,
     1. Retrieve the username and password from the form.
     2. Hash the password for storage in the database.
     2. Query the database with that username.
     3. Check to see if ZERO results were returned
     4. if so,
        a. insert username and hashed password into database
        b. redirect to index. Note that the user is NOT logged in
     5. if not, display message.
   */
   if ($_SERVER["REQUEST_METHOD"] == "POST"){
     $form_username = mysqli_real_escape_string($conn, $_POST['username']);
     $form_password = mysqli_real_escape_string($conn, $_POST['password']);

     $sql="SELECT id FROM user_deets WHERE username='$form_username'";
     $conn->query($sql);
     $result = $conn->query($sql);
     if($result->num_rows==0){
       $hashedpassword= password_hash($form_password, PASSWORD_DEFAULT);
       $sql="INSERT INTO user_deets(username,passcode) values('$form_username','$hashedpassword')";
       //$conn->query($sql);
       if(!mysqli_query($conn,$sql)){
         echo "sql error ".mysqli_error($conn);
       }
	echo $result->num_rows;
       header("location: index.php");
     }else{
     $error = "username is already taken.";
	echo "sql error ".mysqli_error($conn);
     }
   }
?>
<html>

<head>
  <title>Create Account Page</title>
  <style>
    @import url(css/style.css);
  </style>
</head>

<body>
  <div class="center">
    <div class="title"><b>Create Account</b></div>
    <div class="paddedbox">
      <form action="" method="post">
        <label for="username">Username : </label><input type="text" name="username" class="box" /><br /><br />
        <label for="password">Password : </label><input type="password" name="password" class="box" /><br /><br />
        <input type="submit" value=" Create Account " />
      </form>
      <div class="error"><?php echo $error; ?></div>
    </div>
  </div>
</body>

</html>
