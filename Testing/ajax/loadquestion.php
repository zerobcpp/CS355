<?php
session_start();


include '../connection.php';
$question_id="";
$question="";
$opt1="";
$opt2="";
$opt3="";
$opt4="";
$anw="";
$ans="";

$qno=$_GET["questionno"];

if(isset($_SESSION["answer"][$qno]))
{
    $ans =$_SESSION["answer"][$qno];
}

$result =mysqli_query($conn,"select * from question where setname = '$_SESSION[setname]' AND setnameqn =$_GET[questionno]") or die($conn->error);

$count = mysqli_num_rows($result);
if($count==0)
{
    echo "over";
}
else
{
    while($row=mysqli_fetch_array($result))
    {
        $question_id=$row["questionid"];
        $question = $row["question"];
        $opt1 = $row["option1"];
        $opt2 = $row["option2"];
        $opt3 = $row["option3"];
        $opt4 = $row["option4"];
        
    }
    ?>
    <br> 
    <table>
        <tr>
            <td style ="font-weight: bold; font-size: 15px; padding-left:5px; padding-bottom:20px;" colspan="2">
            <?php echo $question_id .": " .$question?>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td>
                <input type ="radio" name ="r1" id = "r1" value ="<?php echo $opt1; ?>" onclick="radioclick(this.value,<?php echo $question_id ?>)"
                <?php 
                if($ans==$opt1)
                {
                echo "checked";
                }
                ?>>

            </td>
            <td>
                <?php echo $opt1;?>
            </td>
        </tr>
        <tr>
            <td>
                <input type ="radio" name ="r1" id = "r1" value ="<?php echo $opt2; ?>"onclick="radioclick(this.value,<?php echo $question_id ?>)"
                <?php 
                if($ans==$opt2)
                {
                echo "checked";
                }
                ?>>

            </td>
            <td>
                <?php echo $opt2;?>
            </td>
        </tr>
        <tr>
            <td>
                <input type ="radio" name ="r1" id = "r1" value ="<?php echo $opt3; ?>"onclick="radioclick(this.value,<?php echo $question_id ?>)"
                <?php 
                if($ans==$opt3)
                {
                echo "checked";
                }
                ?>>

            </td>
            <td>
                <?php echo $opt3;?>
            </td>
        </tr>
        <tr>
            <td>
                <input type ="radio" name ="r1" id = "r1" value ="<?php echo $opt4; ?>"onclick="radioclick(this.value,<?php echo $question_id ?>)"
                <?php 
                if($ans==$opt4)
                {
                echo "checked";
                }
                ?>>

            </td>
            <td>
                <?php echo $opt4;?>
            </td>
        </tr>
        <?php 
}
?> 