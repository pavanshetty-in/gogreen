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
         <h2>About  </h2>
         
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
         <p style="padding: 5%">  E-waste management system is a online electronic scrap market, which our aim is to create a better and cleaner environment by eliminating electronic waste or by recycling it.
                We buy and sell with customers online, we do have a rate card which defines the rate of each household electronic material,at a rate which makes the customer satisfied doing business with us.
                The customer is allotted a vendor at the customer’s doorstep. According to the rate card the customer is paid .
                And we  try to create a greener planet by a lending our small hand .<br>
                <br>

             <b>The website is designed by:<br>
              Pavan.S <br>
              Ritesh.V <br>
              Nirup.D S <br></b>
             <br>
              Under the guidence of <B>prof Hemanth Uppala </B><br>

         </p>
         </div>
    </body>
</html>
