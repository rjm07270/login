<?php
   $ini = parse_ini_file('config/config.ini');
   $conn = new mysqli($ini['DB_SERVER'],
                      $ini['DB_USERNAME'],
                      $ini['DB_PASSWORD'],
                      $ini['DB_DATABASE']);
?>
