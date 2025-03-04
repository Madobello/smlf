<?php
session_start(); 
unset($_SESSION['loginuserid']);
session_destroy();
header("location:index.php"); 
?>
