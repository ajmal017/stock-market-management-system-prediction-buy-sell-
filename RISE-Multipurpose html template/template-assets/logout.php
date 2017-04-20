<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["name"]);
unset($_SESSION["bankaccount"]);
header("Location:index.php");
?>