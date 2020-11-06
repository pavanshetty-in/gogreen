<?php
require 'config.php';
?>
<!DOCTYPE html!>
 <html>
     <head>
        <title>Signup page</title>
        <link rel="icon" type="image.png" href="iocns/loginpage.ico"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/login.css" />  
     </head>
     <body>
        <div class="blockbg">
            <form class="block "  method="post">
             <div class="login" >
                 <h2>Sign Up </h2> 
             </div>
               <div class="inputcontainer" >
                 <input class="textbox" placeholder="Name" type="text" name="User_name" required > <br> 
                 
                 <input class="textbox" placeholder="Phone number" type="tel" pattern="[0-9]{10}" title="Mobile should not contain letters and more than 10 digits" name="Mobile_number" required> <br> 
              
                 <input class="textbox" placeholder="Password" type="password" name="password" required > <br>
                 <input class="textbox" placeholder="Re-enter password" type="password" name="cpassword" required> <br>
              
                 <button class="submitbutton" type="submit" name="submit_btn"  >Sign Up</button><br>
                 
                    <a href="loginpage.php">
                   <button class="signupbtn" type="button" name="signup"   >Login</button>
                    </a>
                </div>
               <div class="imgcontianer">
                <img src="img/ewastebg.png" class="img">
               </div>
               <div class="container" style="background-color:#f1f1f1">
                <a href="index.php"><button type="button"  class="cancelbtn">Cancel</button></a>
                   
               </div>
              </div>
               
            </form>
            <?php 
                      if(isset($_POST['submit_btn']))
                      {
                      

                      $User_name = $_POST['User_name'];
                      $Mobile_number = $_POST['Mobile_number'];
                      $password = $_POST['password'];
                      $cpassword = $_POST['cpassword'];
                      $dt=date("Y-m-d H:i:s");
                      
                      if($password==$cpassword)
                      {
                        
                          $query = "select * from user WHERE Mobile_number=$Mobile_number";
                          $query_run = mysqli_query($con,$query);
                        
                          if(mysqli_num_rows($query_run)>0)
                          {
                            echo '<script type="text/javascript"> alert("number already registered...") </script>';
                          }
                          
                          else
                          {
                                $query= "insert into user(User_name,Mobile_number,password,signin_date_time) values('$User_name','$Mobile_number','$password','$dt')";
                                $query_run = mysqli_query($con,$query);

                                if($query_run)
                                {
                                    echo '<script type="text/javascript"> alert("User Registered.. Go to login page to login") </script>';
                                    echo '<script>window.location.href="loginpage.php"</script>';
                                    
                                }
                                else
                                {
                                    echo '<script type="text/javascript"> alert("Errorrrrr") </script>' .mysqli_error($con);
                                }
                          }
                        }
                        

                      
                      
                      else
                      {
                        echo '<script type="text/javascript"> alert("Password and Confirm password doesnot match") </script>';
                      }

                      }
                      


                    ?>
     </body>
 </html>
