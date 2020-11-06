<?php
require '../config.php';
$pp_work_pincode= $_GET['pp_work_pincode'];
$query = "DELETE FROM `pp` WHERE pp_work_pincode=$pp_work_pincode";
$query_run = mysqli_query($con,$query);
  if($query_run)
  {
    echo '<script type="text/javascript"> alert("Deleted") </script>';
    echo '<script>window.location.href="addpp.php"</script>';
  }
  else
  {
    echo '<script type="text/javascript"> alert("Errorrrrr") </script>' .mysqli_error($con);
  }

?>