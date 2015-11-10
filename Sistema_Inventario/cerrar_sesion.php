<?php
//$idse=$_GET['user'];
session_start();
//unset($idse);
//session_destroy();
//$_SESSION = array();

unset($_SESSION["user"]);
unset($_SESSION["password"]);
unset($_SESSION["tipo"]);

session_destroy();
HEADER("Location:index.php"); // regresa al inicio
?>