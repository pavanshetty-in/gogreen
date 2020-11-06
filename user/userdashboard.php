<?php
require '../config.php';
session_start(); 

  if (!isset($_SESSION['Mobile_number'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['Mobile_number']);
  	header("location: loginpage.php");
  }

?>
<!doctype html!>
<html>
   <head>
     <title >user order history</title>
      <link rel="icon" type="../image.png" href="../loginpage.ico"/>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="../css/adminstyle.css" />
    </head>
   <body>
      <h2>order history</h2>
      <table>
  <thead >
    <th>Order Id</th>
    <th>custumer Name</th>
    <th>Mobile_number</th>
    <th>address</th>
    <th>pincode</th>
    <th>description </th>
    <th>request time</th>
    <th>Status</th>
    <th>Amount</th>
    
  </thead>
  <tbody>
  <?php 
  $user_num= $_SESSION['Mobile_number'];
					$sql="SELECT * FROM `requests` WHERE User_reg_number=$user_num ORDER BY `requests`.`req_id` DESC";
					$query=$con->query($sql);
					
          while($row=$query->fetch_array())
          {
						?>
						<tr>
							              <td ><?php echo $row['req_id']; ?></td>
                            <td><?php echo $row['User_name']; ?></td>
                            <td><?php echo $row['Mobile_number']; ?></td>
                            <td><?php echo $row['Address']; ?></td>
                            <td><?php echo $row['pincode']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['req_date_time']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td><?php echo $row['amount']; ?></td>
                            
						</tr>
						<?php
						
					}
				?>
			</tbody>
        </table>
                </body>
                </html>
