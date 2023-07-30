<?php
session_start();
unset($_SESSION['auname']);
session_destroy();
header("location:adminlogin.html");
?>