<?php
include "connection.php";

$id = $_GET["id"];
echo $id;
mysqli_query($conn,"delete from questionset where setid='$id'");

header("location: base.php")
?>