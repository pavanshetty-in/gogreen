<?php
session_start();
unset($_SESSION['Mobile_number']);

header("Location:index.php");
?>