<?php
require 'config.php';
session_start(); 

  if (!isset($_SESSION['Mobile_number'])) {
  	echo '<script type="text/javascript"> alert("login first") </script>';
     echo '<script>window.location.href="loginpage.php"</script>';
  }
  if (isset($_POST['logout'])) {
  	session_destroy();
  	unset($_SESSION['Mobile_number']);
  	echo '<script>window.location.href="home.html"</script>';
  }
?>

<!DOCTYPE html!>
 <html>
     <head>
        <title>pickup request</title>
        <link rel="icon" type="image/png" href="icons/truck.png"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/login.css" /> 
        <link rel="stylesheet" href="css/model.css"/>
     </head>
     <body>
        <div class="blockbg">
            <form class="block "  method="post">
             <div class="login" >
                 <h2>Request Pickup </h2> 
             </div>
               <div class="inputcontainer" >
               <?php
           $user_num=$_SESSION['Mobile_number'];
           $query= "SELECT * FROM `user` where Mobile_number=$user_num";
           $query_run = mysqli_query($con,$query);
           $row=$query_run->fetch_array();
          ?>
                 <input class="textbox" placeholder="Name" type="text" name="User_name" value="<?php echo $row['User_name']; ?>" required > <br> 
                 
                 <input class="textbox" placeholder="Contact number" type="tel" value="<?php echo $row['Mobile_number']; ?>" pattern="[0-9]{10}" title="Mobile should not contain letters and more than 10 digits" name="Mobile_number" required> <br> 
              
                 <input class="textbox" placeholder="Complete Address" type="text" name="Address" required  > <br>
                 <input class="textbox" placeholder="Pin Code" type="text" name="pincode" id="pin" pattern="[0-9]{6}" required > <br>
                 <input class="textbox" placeholder="describe pickup" type="text" name="description" required> <br>
                 <span style="padding-right: 50px; color:#888">Select date of pickup</span>
                 <select name="select" class="select">
                                  <option value="<?php echo date('y-m-d',strtotime("+1 day")); ?>"><?php echo date('d - m - y',strtotime("+1 day")); ?></option>
                                  <option value="<?php echo date('y-m-d',strtotime("+2 day")); ?>"><?php echo date('d - m - y',strtotime("+2 day")); ?></option>
                                  <option value="<?php echo date('y-m-d',strtotime("+3 day")); ?>"><?php echo date('d - m - y',strtotime("+3 day")); ?></option>
                  </select><br>
                 
                 <button class="submitbutton" type="submit" name="submit_btn" id="submit_btn" >Request</button><br>
                 
                   
                </div>
               <div class="imgcontianer">
                <img src="img/ewastebg.png" class="img">
               </div>
               <div class="container" style="background-color:#f1f1f1">
                <a href="user/userpage.php"><button type="button"  class="cancelbtn">Cancel</button></a>
                   
               </div>
              </div>
               
            </form>
            
            <?php 
                      if(isset($_POST['submit_btn']))
                      {
                      

                      $User_name = $_POST['User_name'];
                      $Mobile_number = $_POST['Mobile_number'];
                      $Address= $_POST['Address'];
                      $pincode= $_POST['pincode'];
                      $description = $_POST['description'];
                      $dt=date("Y-m-d H:i:s");
                      $User_num= $_SESSION['Mobile_number']; 
                      $pickup_date =$_POST['select'];

                      $query = "select * from pp WHERE pp_work_pincode=$pincode";
                      $query_run = mysqli_query($con,$query);
                    
                      if(mysqli_num_rows($query_run)>0)
                      {
                            
                          
                                $query= "insert into requests (User_name,Mobile_number,Address,pincode,description,req_date_time,User_reg_number,pickup_date) values('$User_name','$Mobile_number','$Address','$pincode','$description','$dt','$User_num','$pickup_date')";
                                $query_run = mysqli_query($con,$query);

                                if($query_run)
                                { 
                                  echo '<script type="text/javascript"> alert("request success") </script>';
                                  echo '<script>window.location.href="user/userpage.php"</script>';
                                    
                                }
                                else
                                {
                                    echo '<script type="text/javascript"> alert("Errorrrrr") </script>' .mysqli_error($con);
                                }

                       }
                      
                      else
                      {
                        echo '<script type="text/javascript"> alert("sorry our service is not avilable in this pin code") </script>';
                      }
                   }

                    ?>
 <script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("submit_btn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
                
     </body>
 </html>

