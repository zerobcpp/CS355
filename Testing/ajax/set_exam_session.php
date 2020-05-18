 <?php
 session_start();

 include '../connection.php';
 $setname = $_GET['question_set'];
 $_SESSION["setname"] = $setname;
 $result = mysqli_fetch_array($conn,"select * from questionset where setname = $setname");
while ($row = mysqli_fetch_array($result))
{
    $_SESSION["exam_time"] = $row['time_mins'];
} 
$date = date("Y-m-d H:i:s");
$_SESSION["end_time"] = date("Y-m-d H:i:s",strtotime($date ."+$_SESSION[exam_time] minutes"));

$_SESSION['exam_start']="start";
 
 
 
 ?>