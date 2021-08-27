<?php
   session_start();

   /* Blow up session and redirect to login */
   session_destroy();
   header("location: index.php");
?>
