<?php
session_start();
unset($_SESSION["table"]);
header("Location:login.php");
?>