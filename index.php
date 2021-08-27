<?php
   /* Validate that the session is set up properly. */
   include('session.php');


?>
<html>

   <head>
      <title>Welcome, <?php echo $login_session; ?>!</title>
   </head>

   <body>
      <h1>Welcome to the Site!</h1>
      <p>You are signed in as <?php echo $username; ?>!</p>
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>

</html>
