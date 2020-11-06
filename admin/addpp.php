<?php
require '../config.php';
session_start();
if (!isset($_SESSION['admin_id'])) 
{
  echo '<script type="text/javascript"> alert("login first") </script>';
   echo '<script>window.location.href="adminlogin.php"</script>';
}

?>
<!doctype html!>
<html>
   <head>
     <title >Admin add pp page</title>
     <link rel="icon" type="image/png" href="../icons/1.png"/>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="../css/adminstyle.css" />
      <link rel="stylesheet" href="../css/login.css" />
    </head>
   <body>
   <form   method="post">
      <h2>Add Pickup partner</h2>
      <a href="admindashboard.php"><button class="backbutton" type="button" name="backbutton"  >Back to Home</button></a>
      <div>
      <input class="textbox" placeholder="Pickup partner Name" type="txt" name="pp_name" required ><br>
      <input class="textbox" placeholder="Pickup partner Mobile Number" type="txt" name="pp_num" required ><br>
     
      <input class="textbox" placeholder="Pickup partner password" type="txt" name="pp_password" required ><br>
      <input class="textbox" placeholder="Pickup partner work area" type="txt" name="pp_work_area" required ><br>
      <input class="textbox" placeholder="Pickup partner work area pincode" type="int" name="pp_work_pincode" required ><br>
      <button class="submitbutton" type="submit" name="submit_btn"  >ADD</button>
</div>
     

       
<div>  
      <h2>Pickup partners</h2>
      <table>
  <thead>
    <th>pp Id</th>
    <th> Name</th>
    <th>Mobile number</th>
    <th>work area</th>
    <th>work pincode</th> 
    <th>Remove</th>  
  </thead>
  <tbody>
  <?php 
					$sql="SELECT * FROM `pp` ORDER BY `pp`.`pp_work_pincode` ASC ";
					$query=$con->query($sql);
					
					while($row=$query->fetch_array()){
						?>
						<tr>
							<td ><?php echo $row['pp_id']; ?></td>
                            <td><?php echo $row['pp_name']; ?></td>
                            <td><?php echo $row['pp_num']; ?></td>
                            <td><?php echo $row['pp_work_area']; ?></td>
                            <td><?php echo $row['pp_work_pincode']; ?></td>
                            <td><a href="delete.php?pp_work_pincode=<?php echo $row['pp_work_pincode'];  ?>"><button type="button" style="background-color: red; color:white; padding:5px;" name="submit_btn">Remove</button></a></td>
                            </tr>
                    <?php  }  ?>      
</div>	
</form>
</body>
</html>
<?php 
         if(isset($_POST['submit_btn']))
        {
         $pp_name = $_POST['pp_name'];
         $pp_num = $_POST['pp_num'];
         $pp_password = $_POST['pp_password'];
         $pp_work_area = $_POST['pp_work_area'];
         $pp_work_pincode = $_POST['pp_work_pincode'];

         $query = "select * from pp WHERE pp_work_pincode=$pp_work_pincode";
         $query_run = mysqli_query($con,$query);
           if(mysqli_num_rows($query_run)>0)
            {
                echo '<script type="text/javascript"> alert("Pickup Partner for this this pincode already exist") </script>';
            }
        else
        {
            $query="INSERT INTO `pp` ( `pp_name`, `pp_num`, `pp_password`, `pp_work_area`, `pp_work_pincode`) VALUES ('$pp_name','$pp_num','$pp_password','$pp_work_area','$pp_work_pincode')";
            $query_run = mysqli_query($con,$query);

            if($query_run)
            {
                echo '<script type="text/javascript"> alert("pp added sucessfully") </script>';
                echo '<script>window.location.href="addpp.php"</script>';
            }
            else
                    {
                     echo '<script type="text/javascript"> alert("Errorrrrr") </script>' .mysqli_error($con);
                    }
        }
    }
  ?>
