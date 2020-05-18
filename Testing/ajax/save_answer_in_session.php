<?php
session_start();
print_r($_GET);
$questionno = $_GET["questionno"];
$value = $_GET["radiovalue"];
$_SESSION["answer"][$questionno]=$value;
?>