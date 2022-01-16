<?php
if(!isset($_SESSION)) { 
    session_start(); 
} 
unset($_SESSION['ID']);
unset($_SESSION['name']);
unset($_SESSION['surname'] );
unset($_SESSION['phone']);
unset($_SESSION['mail']);
unset($_SESSION['password']);
unset($_SESSION['credit']);
unset($_SESSION['resnum']);
session_destroy();
header("Location: index.php");
?>