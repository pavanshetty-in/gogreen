<?php 
require 'config.php';
  session_start(); 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>About</title>
        <link rel="icon" type="image/png" href="icons/1.png"/>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" type="text/css" href="rate card/ratecard.css" />
    </head>
    <body style="margin: 0%">
            
       <div class="headding">
         <h2>contact </h2>
         
         <?php
            if (isset($_SESSION['Mobile_number'])){  ?>
            <a href="user/userpage.php"><button class="backbutton" type="button" name="backbutton"  >Back to Home</button></a>
            <?php } 
            else 
            {?>
            <a href="index.php"><button class="backbutton" type="button" name="backbutton"  >Back to Home</button></a>
            <?php } ?>
         </div>
         <div class="card" style="width: 95%">
         <h2>Feel free to reach us at:</h2>
         <h2 style="padding: 3%; text-align: center;">Gogreenrecyclers@gmail.com<br>
         080 26751441<br>


         </h2>
         </div>
    </body>
</html>
