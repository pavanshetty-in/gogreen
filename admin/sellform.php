<?php
require '../config.php';
session_start();
if (!isset($_SESSION['admin_id'])) 
{
  echo '<script type="text/javascript"> alert("login first") </script>';
   echo '<script>window.location.href="adminlogin.php"</script>';
}
?>
<!DOCTYPE html!>
 <html>
     <head>
        <title>sell Recycled Components</title>
        <link rel="icon" type="image/png" href="../icons/truck.png"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/login.css" /> 
        <link rel="stylesheet" href="../css/model.css"/>
        <script>
           function cal(){
            var Substances_Unit = document.getElementById("Substances_Unit").value;
            var Substances_price = document.getElementById("Substances_price").value;
            var amount= Substances_Unit * Substances_price;
            document.getElementById("totamount").innerHTML = amount;
           }

        </script>

     </head>
     <body>
        <div class="blockbg">
            <form class="block "  method="post">
             <div class="login" >
                 <h2>sell Recycled Components </h2> 
             </div>
               <div class="inputcontainer" >
               <span style="padding-right: 50px; color:#888">Select Company</span>
               <select name="company_name" class="textbox"required >
               <option></option>
               <?php 
					$sql="SELECT company_name FROM company";
					$query=$con->query($sql);
					
					while($row=$query->fetch_array()){
						?>
               <option value="<?php echo $row['company_name']; ?>"><?php echo $row['company_name']; ?></option>
               </tr>
						<?php
						
					}
				?>

               </select><br>
               <span style="padding-right: 50px; color:#888">Select Substances </span>
               <select name="Substances" class="textbox"required >
               <option></option>
               <option value="Copper">Copper</option>
               <option value="Fiberglass">Fiberglass</option>
               <option value="PVC (polyvinyl chlorides)">PVC (polyvinyl chlorides)</option>
               <option value="Thermosetting plastics"> Thermosetting plastics</option>
               <option value=" lead"> lead</option>
               <option value="iron">iron</option>
               <option value="epoxy resins">epoxy resins</option>
               <option value="tin">tin</option>
               <option value="Gold">Gold</option>
               <option value="Other Substances">Other Substances</option>

               </select><br>

               <input class="textbox" id="Substances_Unit" placeholder="Substances Unit in Number/Kg's" type="number" pattern="[0-9]" name="Substances_Unit"  required > <br> 
                 
                 <input class="textbox" id="Substances_price" placeholder="Substances Rate per units" type="number"  pattern="[0-9]" onkeyup="cal()" name="Substances_price" required> <br> 
              
                 
                 <label class="calrate" id="totamount" style="font-size: 40px; margin-right: 5px; color: #5cb85c;">0</label><label style="font-size: 40px; margin-right: 160px; color: #5cb85c;">/- Rs</label> <br>
                 
                 <button class="submitbutton" type="submit" name="submit_btn" id="submit_btn" >Sell</button><br>
                 
                   
                </div>
               <div class="imgcontianer">
                <img src="../img/ewastebg.png" class="img">
               </div>
               <div class="container" style="background-color:#f1f1f1">
                <a href="./admindashboard.php"><button type="button"  class="cancelbtn">Cancel</button></a>
                   
               </div>
              </div>
               
            </form>
            <?php 
                      if(isset($_POST['submit_btn']))
                      {
                        $company_name = $_POST['company_name'];
                        $Substances = $_POST['Substances'];
                        $Substances_Unit = $_POST['Substances_Unit'];
                        $Substances_price = $_POST['Substances_price'];
                        $dt=date("Y-m-d H:i:s");
                        $total= $Substances_Unit * $Substances_price;

                        $query="INSERT INTO `substances_sales`(`company_name`, `Substances`, `Substances_Unit`, `Substances_price`, `total`, `sales_datetime`) VALUES ('$company_name','$Substances','$Substances_Unit','$Substances_price','$total','$dt')";
                        $query_run = mysqli_query($con,$query);
                        if($query_run)
                                { 
                                  echo '<script type="text/javascript"> alert("sales Recoded") </script>';
                                  echo '<script>window.location.href="./admindashboard.php"</script>';
                                    
                                }
                                else
                                {
                                    echo '<script type="text/javascript"> alert("Some Unexpected Error") </script>' .mysqli_error($con);
                                }

                      }
         ?>
 </body>
 </html>