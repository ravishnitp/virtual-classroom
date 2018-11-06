
<?php
include "navbar.php";
?>

<div class="main">
    <?php

if($_SESSION['susername'] && isset($_GET['qid'])   )
{
    $user = $_SESSION['susername'];
    $sql5 = "select * from students where username='$user'";
    $res5 = mysqli_query($conn, $sql5);
    $row5 = mysqli_fetch_assoc($res5);
    $sid  = $row5['sid'];

    $qid = $_GET['qid'];
    $sql         = "select * from quiz  where qid=$qid  ";
    $res         = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $qTitle = $row['title'];
    $cid = $row['cid'];
    $noOfQuestions= $row['noOfQuestions'];
    if($noOfQuestions  < 1)
    {
        header("Location: takeTest.php");
        $_SESSION['TestMessage']="<div class='chip red black-text'>No Questions Available</div>";
        die("No Questions Available");
    }

    $fid=$row['fid'];
    $sql2         = "select * from course  where cid=$cid  ";
    $res2         = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($res2);
    $courseCode = $row2['courseCode'];

?>
<!-- For Timer -->
<script type="text/javascript">
            function countDown(secs, elem)
            {
                var element = document.getElementById(elem);
                element.innerHTML = "<h5 class=\"left-align\" style=\"font-variant: small-caps; font-weight: bold;\">Time Remaining : "+secs+" sec</h5>";
                if(secs < 1) {
                    document.quiz.submit();
                }
                else
                {
                    secs--;
                    setTimeout('countDown('+secs+',"'+elem+'")',1500);
                }
            }

            function validate() {
                return true;
            }
            </script> 
            <!-- Timer ends --> 
 <div class="col l6 offset-l3 m8 offset-m2 s12" id="login" style="margin:20px;">
 <div class="card-panel  teal lighten-5" style="margin-top:1px">
 <h5  class="left-align" style="font-variant: small-caps; font-weight: bold;">Course&nbsp;Code : <?php echo $courseCode?></h5>
 <h5  class="left-align" style="font-variant: small-caps; font-weight: bold;">Marks : <?php echo $noOfQuestions*4?></h5>
    <div id="status"></div>
            <script type="text/javascript">
                var question = <?php echo $noOfQuestions?>;
                countDown(question*4*60,"status");
            </script>
            <style type="text/css"> 
            span { 
                color: #FF00CC;
            }
            </style>

</div>
      <div class="card-panel  teal lighten-5" style="margin-top:1px">
        <form name="quiz" id="myquiz" onsubmit="return validate()"  action="submitTest2.php" method="post" >
        <div class="input-field">
            <input name="qid" readonly value="<?php echo $qid;?>" id="qid" type="text"  >
            <label for="qid">Quiz&nbsp;Id</label>
          </div>
        
          <div class="row" id="question">
          <?php
          $sql3 = "select * from quizquestions where qid=$qid  order by QuesId";
          $res3 = mysqli_query($conn, $sql3);
          
          //for no of enrolled course
          if (mysqli_num_rows($res3) > 0) {
              $i = 1;

              while ($row3 = mysqli_fetch_assoc($res3)) {
                  //print_r($row3);
                  //echo "<br>";
                $option = 1;
                $answer = 1;
                $code= '<div class="input-field">';
                $quesid=$row3['QuesId'];
                $question=$row3['question'];
                $optionA = $row3['optionA'];
                $optionB = $row3['optionB'];
                $optionC = $row3['optionC'];
                $optionD =$row3['optionD'];

                $code=$code .'Question&nbsp;'.($i).'&nbsp;<input type="text" style="font-variant: large-caps; font-weight: bold;" readOnly value="'.$question.'"name="question' ;
                 $code = $code . ($i+1).'"></div>';
                 $code = $code."\n";
                 
                $code = $code.'<input type="radio"class="with-gap" type="radio" value="A"   name="' .$quesid. '"id="A'.$quesid.'"> <label for="A'.$quesid.'">'.$optionA.'</label>';
                $code = $code."<br>\n";
                $code = $code.'<input type="radio"class="with-gap" type="radio" value="B"   name="' .$quesid. '"id="B'.$quesid.'"> <label for="B'.$quesid.'" >'.$optionB.'</label>';
                $code = $code."<br>\n";
                $code = $code.'<input type="radio"class="with-gap" type="radio" value="C"   name="' .$quesid. '"id="C'.$quesid.'"> <label for="C'.$quesid.'" >'.$optionC.'</label>';
                $code = $code."<br>\n";
                $code = $code.'<input type="radio"class="with-gap" type="radio" value="D"   name="' .$quesid. '"id="D'.$quesid.'"> <label for="D'.$quesid.'">'.$optionD.'</label>';
                $code = $code."<br>\n";
                 echo $code;
                 $i++;

            }

        }

            ?>
          
          <center>
          <input type="submit" name="submitButton" value="Submit" class="btn btn-large"></center>
          </div>
        </form>
        </div>
    
    </div>

<?php

}
include "footer.php";
?>
