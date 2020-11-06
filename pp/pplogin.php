<?php
require '../config.php';



  
?>
<!doctype html!>
<html>
   <head>
     <title >Pickup partner Login page</title>
      <link rel="icon" type="../image.png" href="../icons/loginpage.ico"/>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="../css/login.css" />
    </head>
    <body>
      <div class="blockbg">
       <form class="block "  method="post">
        <div class="login" >
            <h2>Pickup partner Login </h2> 
        </div>
          <div class="inputcontainer" >
            
            <input class="textbox" placeholder="Area Pincode" type="text" name="pincode"> <br> 
         
            <input class="textbox" placeholder="Password" type="password" name="password" > <br>
         
            <button class="submitbutton" type="submit" name="login"  >login</button><br>
            
        
              
           </div>
          <div class="imgcontianer">
           <img src="../img/ewastebg.png" class="img">
          </div>
          <div class="container" style="background-color:#f1f1f1">
             <a href="../index.php"><button type="button"  class="cancelbtn">Cancel</button></a>
              
          </div>
      </div>
          
    </form>
    <?php
                    if(isset($_POST['login']))
                    {                        
                        

                        $pincode=$_POST['pincode'];
                       $password=$_POST['password'];

                        $query= "select * from pp WHERE pp_work_pincode  ='$pincode' AND pp_password ='$password'";
                        $query_run = mysqli_query($con,$query);
                        if(mysqli_num_rows($query_run)>0)
                        {
                          session_start();
                            echo '<script type="text/javascript"> alert("Pickup partner Logged in") </script>';
                            $_SESSION['pincode'] =$pincode;
                            echo '<script>window.location.href="pp_dashboard.php"</script>';
                        }
                        else
                        {
                          echo '<script type="text/javascript"> alert("Invalid Credentials") </script>';
                        
                       }

                    }
                    ?>

  </body>
</html>
