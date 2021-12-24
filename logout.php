<?php 
session_start();
require "functions.php";

// Hapus Cookie
setcookie('id', '', time()-3600, '/');
setcookie('key', '', time()-3600, '/');

// Offlinekan user di database
$username = $_SESSION['username'];
mysqli_query($conn, "UPDATE user SET status = 'offline' WHERE username = '$username'");

$_SESSION['login'] = "";
$_SESSION['username'] = "";
session_destroy();
header("Location: index.html");


?>