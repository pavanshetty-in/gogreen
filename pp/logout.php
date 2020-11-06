<?php
session_start();
unset($_SESSION['pincode']);
header("Location:../index.php");
?>