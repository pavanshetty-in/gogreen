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
     <title >Admin view page</title>
     <link rel="icon" type="image/png" href="../icons/1.png"/>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="../css/adminstyle.css" />
    </head>
   <body>
      <h2>Sales history</h2>
      <a href="admindashboard.php"><button class="backbutton" type="button" name="backbutton"  >Back to Home</button></a>
      <table>
  <thead>
    <th>Company Name </th>
    <th>Substances</th>
    <th>Substances Unit</th>
    <th>Substances Price </th>
    <th>total </th>
    <th>Sales Date and time </th>
    
    
  </thead>
  <tbody>
  <?php 
					$sql="SELECT * FROM `substances_sales` ORDER BY sales_datetime DESC";
					$query=$con->query($sql);
					
					while($row=$query->fetch_array()){
						?>
						<tr>
							<td ><?php echo $row['company_name']; ?></td>
                            <td><?php echo $row['Substances']; ?></td>
                            <td><?php echo $row['Substances_Unit']; ?></td>
                            <td><?php echo $row['Substances_price']; ?></td>
                            <td><?php echo $row['total']; ?></td>
                            <td><?php echo $row['sales_datetime']; ?></td>
                            
                            
						</tr>
						<?php
						
					}
				?>
			</tbody>
        </table>
                </body>
                </html>
