<?php
session_start(); 
unset($_SESSION["username"]);
unset($_SESSION["cart"]);
setcookie("user", "", time() - 3600, "/");
header("Location: index.php");
exit();
?>