<?php 
require '../config.php';
  session_start(); 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>rate card</title>
        <link rel="icon" type="image/png" href="../icons/1.png"/>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" type="text/css" href="ratecard.css" />
    </head>
    <body>
        <div class="headding">
            <h2> Rate Card </h2>
            <?php
            if (isset($_SESSION['Mobile_number'])){  ?>
            <a href="../user/userpage.php"><button class="backbutton" type="button" name="backbutton"  >Back to Home</button></a>
            <?php } 
            else 
            {?>
            <a href="../index.php"><button class="backbutton" type="button" name="backbutton"  >Back to Home</button></a>
            <?php } ?>
        </div>
        <a href="../requestpage.php"><div class="card">
            <img src="img/ac1.jpg" alt="img cant load" style="width: 100%">
            <div class="container">
            <h5>1.5 Ton AC</h5>
            <h2>1000 Rs per Unit </h2>
            </div>
        </div></a>
        <a href="../requestpage.php"><div class="card">
            <img src="img/ac1.jpg" alt="img cant load" style="width: 100%">
            <div class="container">
            <h5>1 Ton AC</h5>
            <h2>800 Rs per Unit </h2>
            </div>
        </div>
        <a href="../requestpage.php"><div class="card">
            <img src="img/airc.jpg" alt="img cant load" style="width: 100%">
            <div class="container">
            <h5> Air cooler</h5>
            <h2>1200 Rs per Unit </h2>
            </div>
        </div> 
        
        <a href="../requestpage.php"><div class="card">
            <img src="img/computer.jpg" alt="img cant load" style="width: 100%">
            <div class="container">
             <h5>Computer</h5>
             <h2>4000 Rs per Unit </h2>
            </div>
        </div> </a> 
        <a href="../requestpage.php"><div class="card">
            <img src="img/laptop.jpg" alt="img cant load" style="width: 100%">
            <div class="container">
            <h5> Laptop</h5>
            <h2>5000 Rs per Unit </h2>
            </div>
        </div></a>
        <a href="../requestpage.php"><div class="card">
            <img src="img/mobile1.jpg" alt="img cant load" style="width: 100%">
            <div class="container">
             <h5> Mobile Phone</h5>
             <h2>500 Rs per Unit </h2>
            </div>
        </div> </a>   
        <a href="../requestpage.php"><div class="card">
            <img src="img/wash.jpg" alt="img cant load" style="width: 100%">
            <div class="container">
            <h5>Washing Machine</h5>
            <h2>1000 Rs per Unit </h2>
            </div>
        </div> </a>   
        <a href="../requestpage.php"><div class="card">
            <img src="img/battry.jpg" alt="img cant load" style="width: 100%">
            <div class="container">
            <h5>batteries</h5>
            <h2>1500 Rs per Unit </h2>
            </div>
        </div></a>
        <a href="../requestpage.php"><div class="card">
                <img src="img/camera.jpg" alt="img cant load" style="width: 100%">
                <div class="container">
                <h5>CamaraC</h5>
                <h2>1000 Rs per Unit </h2>
                </div>
            </div></a>
            <a href="../requestpage.php"><div class="card">
                <img src="img/ledtv.jpg" alt="img cant load" style="width: 100%">
                <div class="container">
                <h5>LED/LCD TV </h5>
                <h2>1500 Rs per Unit </h2>
                </div>
            </div></a>
            <a href="../requestpage.php"><div class="card">
                <img src="img/oldtv.jpg" alt="img cant load" style="width: 100%">
                <div class="container">
                <h5>TV</h5>
                <h2>500 Rs per Unit </h2>
                </div>
            </div></a>
            <a href="../requestpage.php"><div class="card">
                <img src="img/printer.jpg" alt="img cant load" style="width: 100%">
                <div class="container">
                <h5>printer</h5>
                <h2>500 Rs per Unit </h2>
                </div>
            </div> </a>  
            <h2 style="color:red">*Price may vary according to Product Condition<h2>  
                 
    </body>
</html>