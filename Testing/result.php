<?php
include 'header.php';
include 'connection.php'
?>

<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">
    <div class="col-lg-7 col-lg-push-2" style="min-height: 500px; background-color: white;">
    <?php

        $correct = 0;
        $wrong = 0;
        if (isset($_SESSION["answer"]))
        {
            for ($i = 1  ;$i<sizeof($_SESSION["answer"]);$i++)
            {
                $answer ="";
                $result = mysqli_query($conn,"select * from question where setname = '$_SESSION[setname]' and setnameqn=$i") or die($conn->error);
                while($row = mysqli_fetch_array($result))
                {
                    $answer = $row['answer'];
                }
                if (isset($_SESSION["answer"][$i]))
                {
                    if($answer==$_SESSION["answer"][$i])
                    {
                        $correct +=1;
                    }
                    else
                    {
                        $wrong+=1;
                    }
                }
                else{
                    $wrong +=1;
                } 
            }
        }
        $result = mysqli_query($conn,"select * from question where setname = '$_SESSION[setname]'");
        $count = mysqli_num_rows($result);
        $wrong =$count - $correct;

        echo "<br>" ."<br>"
        . "<center>"
        .  "Total Question: " .$count
        . "<br>"
        ."Correct Answers: " .$correct
        ."<br>"
        ."Wrong Answer: " . $wrong
        ."</center>";


        $result = mysqli_query($conn, "insert into exam_result(user, total_question,correct,wrong,setname) VALUES('$_SESSION[username]',$count,$correct,$wrong,'$_SESSION[setname]')");
    ?>

        </div>

 </div>


