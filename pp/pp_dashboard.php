<?php
require '../config.php';
session_start();
if (!isset($_SESSION['pincode'])) 
{
  echo '<script type="text/javascript"> alert("login first") </script>';
   echo '<script>window.location.href="pplogin.php"</script>';
}

  
?>
<!doctype html!>
<html>
   <head>
     <title >pp leads page</title>
     <link rel="icon" type="image/png" href="../icons/1.png"/>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="../css/adminstyle.css" />
    </head>
    <form method="post">
   <body>
      <h2>Leads</h2>
      
      <?php
           $user_num=$_SESSION['pincode'];
           $query= "SELECT * FROM `pp` where pp_work_pincode=$user_num";
           $query_run = mysqli_query($con,$query);
           $row=$query_run->fetch_array();
          ?>
      <h4 style="float: center; color: #4CAF50;"><?php echo strtoupper($row['pp_name']); ?><br>
      <?php echo strtoupper($row['pp_work_area']); ?>
      </h4>
      <a  style="float:right;"href="logout.php"><p>Logout</p></a><br>
      <table>
  <thead>
    <th>Order Id</th>
    <th>Pickup Date</th>
    <th>custumer Name</th>
    <th>Mobile_number</th>
    <th>address</th>
    <th>pincode</th>
    <th>description </th>
    <th>request time</th>
    <th>Current status</th>
    <th>Status</th>
    <th>conform Order id</th>
    <th>amount payable</th>
    <th> Update</th>
    
  </thead>
  <tbody>
  <?php 
  $pincode=$_SESSION['pincode'];
					$sql="SELECT * FROM `requests`WHERE 'cancelled'!=status and'Picked successfully'!=status AND $pincode=pincode ORDER BY `requests`.`pickup_date` ASC" ;
					$query=$con->query($sql);
					
					while($row=$query->fetch_array()){
						?>
						<tr>
              <td ><?php echo $row['req_id']; ?></td>
              <td><?php echo $row['pickup_date']; ?></td>
                            <td><?php echo $row['User_name']; ?></td>
                            <td><?php echo $row['Mobile_number']; ?></td>
                            <td><?php echo $row['Address']; ?></td>
                            <td><?php echo $row['pincode']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['req_date_time']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td><select name="selected">
                                 <option value="---">---</option>
                                  <option value="Order accepted">Order accepted</option>
                                  <option value="will pick Today">will pick Today</option>
                                  <option value="Picked successfully">Picked successfully</option>
                                  <option value="cancelled">Cancelled</option>
                                   </select></td>
                                   <td><input type="int" placeholder="orderid" name="orderid" ></td>
                            <td><input type="int" placeholder="amount" name="amount"></td>
                            <td><button type="submit" style="background-color: #4CAF50; color:white; padding:5px;" name="submit_btn">Update</button></td>

                            
						</tr>
						<?php
						
					}
				?>
			</tbody>
        </table>
                </form>
                </body>
                </html>
<?php
if(isset($_POST['submit_btn']))
{
  $status= $_POST['selected'];
  $amount=$_POST['amount'];
  $orderid=$_POST['orderid'];
  $query = "UPDATE `requests` SET `status` ='$status' , `amount` = '$amount' WHERE `requests`.`req_id` = '$orderid'";
  $query_run = mysqli_query($con,$query);
  if($query_run)
  {
    echo '<script type="text/javascript"> alert("Updated") </script>';
    echo '<script>window.location.href="pp_dashboard.php"</script>';
  }
  else
  {
    echo '<script type="text/javascript"> alert("Errorrrrr") </script>' ;
  }
}
?>