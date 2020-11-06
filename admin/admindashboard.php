<?php
require '../config.php';
session_start();
if (!isset($_SESSION['admin_id'])) 
{
  echo '<script type="text/javascript"> alert("login first") </script>';
   echo '<script>window.location.href="adminlogin.php"</script>';
}
?>
<html>
    <head>
        <title>Admin Home Page</title>
        <link rel="icon" type="image/png" href="../icons/1.png"/>
        <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet"  href="../css/homepage.css">
        <link rel="stylesheet"  href="../rate card/ratecard.css">
        <link rel="stylesheet" href="../css/login.css" />
        
    </head>
    <body>
      <div>
        <img src="../img/capture.png" style="position:relative; left: 27%; width: 700px; ">
      </div>
      <div  class="topnav" id="myTopnav" style="position: stickey;">
        <a href="admindashboard.php" style="background-color: #4CAF50; color: white;"> Dashboard</a>
        <a href="addpp.php">Add pp</a>
        <a href="allorders.php">All Orders</a>
        <a href="search.php">search by order id</a>
        <a href="sellform.php">sell recycled </a>
        <a href="saleshistory.php">Sales history </a>
        <a style="float:right;" href="logout.php">Logout</a>
    </div>
    <div>
    <div >
    <a href="allorders.php"><div class="card">
      <?php
        $query="SELECT COUNT(*) as COUNT FROM requests";
        $query_run = mysqli_query($con,$query);
        $row=$query_run->fetch_array();
      ?>
      <h2><?php echo $row['COUNT']; ?><h2>
        <p>Total number of Orderd Placed<p>

    </div></a>
    <a href="allorders.php"><div class="card">
      <?php
        $query="SELECT COUNT(*) as COUNT FROM requests where 'Picked successfully'=status";
        $query_run = mysqli_query($con,$query);
        $row=$query_run->fetch_array();
      ?>
      <h2><?php echo $row['COUNT']; ?><h2>
        <p>Total number of Orderd completed<p>

    </div></a>
    <a href="addpp.php"><div class="card">
      <?php
        $query="SELECT COUNT(*) as COUNT FROM pp";
        $query_run = mysqli_query($con,$query);
        $row=$query_run->fetch_array();
      ?>
      <h2><?php echo $row['COUNT']; ?><h2>
        <p>Total number of Pickup partners<p>

    </div></a>
    <a href="#addpp.php"><div class="card">
      <?php
        $query="SELECT COUNT(*) as COUNT FROM user";
        $query_run = mysqli_query($con,$query);
        $row=$query_run->fetch_array();
      ?>
      <h2><?php echo $row['COUNT']; ?><h2>
        <p>Total number of Registered Users<p>

    </div></a>
</div>
</div>

<h1 style="text-align: center;">sales Report</h1>
</div>

<div style="margin-bottom: 5%;">
  <?php
  $sql="SELECT company_name,SUM(total) AS 'totsales' FROM substances_sales GROUP BY company_name ORDER BY `totsales` DESC";
  $query=$con->query($sql);
  
  while($row=$query->fetch_array()){
    ?>
     <a href="saleshistory.php"><div class="card">
    <h2><?php echo $row['company_name']; ?><h2>
    <h2><?php echo $row['totsales']; ?><h2>

    <h5>Worth of Substances Sold<h5>

    </div></a>
       
    <?php
    
  }
?>
</div><br>
<div style="width: 100%; text-align: center;margin-top: 5%; color: transparent;" >
<h1 style="text-align: center;">Add NEW Client Company</h1>
</div>
<div style="width: 100%; text-align: center;margin-top: 5%; " >
<h1 style="text-align: center;">Add NEW Client Company</h1>
</div>

    <footer>
      <form method="post" style="text-align: center;"  >
        <input name="new_company" class="textbox" placeholder="Company Name" type="text" name="new_company"  required><br>
        <button class="submitbutton" type="submit" name="addcomp_btn" id="addcomp_btn" >Add a company</button><br>
        

      </form>
      <?php 
                      if(isset($_POST['addcomp_btn']))
                      {
                        $new_company = $_POST['new_company'];
                        

                        $query="INSERT INTO `company`( `company_name`) VALUES ('$new_company')";
                        $query_run = mysqli_query($con,$query);
                        if($query_run)
                                { 
                                  echo '<script type="text/javascript"> alert("Company Added") </script>';
                                  echo '<script>window.location.href="./admindashboard.php"</script>';
                                    
                                }
                                else
                                {
                                    echo '<script type="text/javascript"> alert("Some Unexpected Error") </script>' .mysqli_error($con);
                                }

                      }
         ?>
  </footer>

</body>
</html>