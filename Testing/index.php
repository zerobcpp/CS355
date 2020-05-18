<?php
include 'header.php';
include 'connection.php'
?>

<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">
    <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">

    <?php
    $result = mysqli_query ($conn,"select * from questionset");
    while($row = mysqli_fetch_array($result))
    {
        ?>
        <p> To do <p>
        <input type ="button" class = "btn btn-primary" style ="margin-top:10px;" value = "<?php echo $row["setname"];?>" onclick="question_set_session(this.value)" >  
        <?php
    }
    ?>

    </div>


</div>

<script type = "text/javascript">
function question_set_session(setname)
{
    var ajaxrequest = new XMLHttpRequest();
    ajaxrequest.onreadystatechange=function(){
        if (ajaxrequest.readyState==4&&ajaxrequest.status==200)
        {
            window.location ="board.php";
        }
    };
    ajaxrequest.open("GET","ajax/set_exam_session.php?question_set="+setname,true); 
    ajaxrequest.send(null);
        

}
</script>



<div class="footer-copyright-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer-copy-right">
                    <p>Final Project.</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


</body>

</html>