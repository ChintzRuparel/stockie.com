<?php
session_start();
unset($_SESSION["charttable"]);
header("Location:adminchoice.html");
?>