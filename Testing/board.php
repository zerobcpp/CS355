<?php

include 'header.php';
include 'connection.php'
?>

<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">
    <div class="col-lg-7 col-lg-push-2" style="min-height: 500px; background-color: white;">
        <!-- question -->

        <div class="row">
            <br>
            <div class="col-lg-push-2">
                <div id="currquestion" style="float:left;"></div>
                <div style ="float:left;"></div>
                <div id="totquestion" style="float:left;"></div>


            </div>
            <div class="row">
                <div class="row">
                    <div class="col-lg-10" style="background-color:white;" id="load_question" style="min-height:300px;">

                    </div>
                </div>

            </div>
            <div class = "row">
                <div class ="col-lg-8 col-lg-push-5">
                    <input type ="button" class ="btn btn-warning btn-lg" id = "prev" value ="prev" onclick="load_prev()">
                    <input type ="button" class ="btn btn-primary btn-lg" id = "next" value="next" onclick="load_next()">
                    <hr>
                    <input type ="button" class ="btn btn-success btn-lg" id = "submit" value="submit" onclick="window.location='result.php'">
                    
                </div>
            </div>

        </div>

    </div>


</div>
<script type = "text/javascript">
var questionno="1";
loadquestion(questionno);
var asd = document.getElementById("currquestion").value;



function loadtotquestion()
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4&&xmlhttp.status==200)
        {
            document.getElementById("totquestion").innerHTML=xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET","ajax/loadtotquestion.php",true); 
    xmlhttp.send(null);
}

function loadquestion(questionno)
{
    document.getElementById("currquestion").innerHTML = questionno+ '/';
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4&&xmlhttp.status==200)
        {
            if(questionno>document.getElementById("totquestion").value+1)
            {
                window.location="result.php";
            }
        }
        else 
        {
            document.getElementById("load_question").innerHTML=xmlhttp.responseText;
            loadtotquestion();
        }
    };
    xmlhttp.open("GET","ajax/loadquestion.php?questionno="+questionno,true); 
    xmlhttp.send(null);
}

function radioclick(radiovalue,questiono)
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
        if(xmlhttp.readyState==4&&xmlhttp.status==200)
        {

        }
    };
    xmlhttp.open("GET","ajax/save_answer_in_session.php?questionno="+questionno+"&radiovalue="+radiovalue,true); 
    xmlhttp.send(null);
}

function load_prev()
{
    if(questionno=="1")
    {
    loadquestion(questionno);
    }
    else
    {
        questionno = eval(questionno)-1;
        loadquestion(questionno);
    }
}


function load_next()
{
    questionno=eval(questionno)+1;
    loadquestion(questionno);
}
</script>