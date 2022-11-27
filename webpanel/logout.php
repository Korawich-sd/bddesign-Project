<?php
session_start();
unset($_SESSION['admin_login']);
unset($_SESSION['lang']);
header("location: login.php");
?>