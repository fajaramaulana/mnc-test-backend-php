<?php
session_start();
 
$username = $_POST['username'];
 
$_SESSION['username'] = $username;
header('location:home.php');