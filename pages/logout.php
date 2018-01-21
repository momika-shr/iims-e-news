<?php
session_start();
include'conn.php';
unset($_SESSION['username']);

//session_destroy();
header('location:login.php');
?>