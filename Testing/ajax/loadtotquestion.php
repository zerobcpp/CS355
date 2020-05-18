<?php
session_start();
include "../connection.php";

$result =mysqli_query($conn,"select * from question where setname ='$_SESSION[setname]'");
$totalque = mysqli_num_rows($result);

echo $totalque;


?>