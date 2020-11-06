<?php 
require '../config.php';
  session_start(); 

  if (!isset($_SESSION['Mobile_number'])) {
  	echo '<script type="text/javascript"> alert("login first") </script>';
     echo '<script>window.location.href="../loginpage.php"</script>';
  }
  if (isset($_post['logout'])) {
  	session_destroy();
  	unset($_SESSION['Mobile_number']);
  	echo '<script>window.location.href="index.html"</script>';
  }
?>

<html>
    <head>
        <title>home page</title>
        <link rel="icon" type="image/png" href="../icons/home.png"/>
        <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/homepage.css"/>

    </head>
    <body>
      <form methord="post">
      <div>
        <img src="../img/capture.png" style="position:relative; left: 27%; width: 700px; ">
      </div>
      <div class="topnav" id="myTopnav">
        <a href="userpage.php" style="background-color: #4CAF50; color: white;">Home</a>
        <a href="../about.php">About</a>
        <a href="../contact.php">Contact</a>
        <a href="../rate card/ratecard.php">Rate Card</a>
        <a href="../requestpage.php">Request Pickup</a>
          <?php
           $user_num=$_SESSION['Mobile_number'];
           $query= "SELECT User_name FROM `user` where Mobile_number=$user_num";
           $query_run = mysqli_query($con,$query);
           $row=$query_run->fetch_array();
          ?>
          <div class="dropdown" style="float: right;">
          <button class="dropbtn" style="padding:13px 35px; "><img src="../icons/profile.png" style="width: 17px;  " >  h! <?php echo strtoupper($row['User_name']); ?> &#x25BC;</button>
          <div  class="dropdown-content" style="float:right">
            <a href="userdashboard.php">Order History</a>
            <a href="../logout.php">Logout</a>
            
          </div>
        </div> 
    </div>
    <div class="imgcontainer" >
        <img src="../img/img1.jpg"  style="width: 100% ;height: 540px;">
    </div>
    <div class="vediobg">
      <div class="vediopos">
      <iframe style="width: 100%; height: 100%;"  src="https://www.youtube.com/embed/HzuXQUD9Rkg"></iframe>
      </div>
    </div>
    <div class="imgcontainer" >
        <img src="../img/img3.jpg"  style="width: 100% ;height: 540px;">
    </div>
    <div class="end">
     <a href="../contact.php"> <p style="padding: 2px; color:white;" >Contact us</p></a>
    </div>       
    </body>
    </form>
</html>
