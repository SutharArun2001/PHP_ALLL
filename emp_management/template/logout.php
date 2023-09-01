<?php
session_start();
unset($_SESSION['role']);
unset($_SESSION['is_login']);
header("location:login.php");
die();
?>