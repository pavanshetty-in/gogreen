<?php
require '../config.php';

?>
<!doctype html!>
<html>
   <head>
     <title >Admin Login page</title>
      <link rel="icon" type="../image.png" href="../icons/loginpage.ico"/>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="../css/login.css" />
    </head>
    <body>
      <div class="blockbg">
       <form class="block "  method="post">
        <div class="login" >
            <h2>Admin Login </h2> 
        </div>
          <div class="inputcontainer" >
            
            <input class="textbox" placeholder="Admin ID" type="text" name="Mobile_number"> <br> 
         
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
                        

                        $Mobile_number=$_POST['Mobile_number'];
                       $password=$_POST['password'];

                        $query= "select * from admin WHERE admin_id='$Mobile_number' AND password='$password'";
                        $query_run = mysqli_query($con,$query);
                        if(mysqli_num_rows($query_run)>0)
                        {
                          session_start();
                            echo '<script type="text/javascript"> alert("admin Logged in") </script>';
                            $_SESSION['admin_id'] =$Mobile_number;
                            echo '<script>window.location.href="admindashboard.php"</script>';
                        }
                        else
                        {
                          echo '<script type="text/javascript"> alert("Invalid Credentials") </script>';
                        
                       }

                    }
                    ?>

  </body>
</html>
