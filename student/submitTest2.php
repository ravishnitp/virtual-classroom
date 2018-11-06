<?php
include "navbar.php";
?>

<div class="main">
    <?php

if($_SESSION['susername']    )
{
    $user = $_SESSION['susername'];
    $sql5 = "select * from students where username='$user'";
    $res5 = mysqli_query($conn, $sql5);
    $row5 = mysqli_fetch_assoc($res5);
    $sid  = $row5['sid'];

    $qid = $_POST['qid'];
	/* check if test has been previously responded */
	$sql10         = "select * from course  where cid=$cid  ";
    $res10         = mysqli_query($conn, $sql10);
	if(mysqli_num_rows($res10) > 0)
	{
		 header("Location: takeTest.php");
        $_SESSION['TestMessage']="<div class='chip red black-text'>Could Not Reattempt Test</div>";
        die("Could Not Reattempt Test");
	}
	
	
   // echo "qid".$qid."<br>";
    $sql         = "select * from quiz  where qid=$qid  ";
    $res         = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $qTitle = $row['title'];
    $cid = $row['cid'];
    $noOfQuestions= $row['noOfQuestions'];

    // Extract course details for result publication
    $sql2         = "select * from course  where cid=$cid  ";
    $res2         = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($res2);
    $courseCode = $row2['courseCode'];

    // variables for result
    $resbody='';
	$actualAns='';
    $correctAnswer = 0;
    $notAnswered = 0;


    $sql3 = "select * from quizquestions where qid=$qid  order by QuesId";
          $res3 = mysqli_query($conn, $sql3);
          
          //for no of enrolled course
          if (mysqli_num_rows($res3) > 0) {
              $i = 1;

              while ($row3 = mysqli_fetch_assoc($res3)) {
                  $quesId = $row3['QuesId'];
                 // print_r($row3);
                 // echo "<br>";
                  $ans = $row3['answer'];
				  $actualAns = $actualAns.strtoupper($ans);
                 // echo "ans ".$ans."<br>";
                  if(isset($_POST[$quesId])){
                      $resbody = $resbody . strtoupper($_POST[$quesId]); 
                  //echo "ans given ".$_POST[$quesId]."<br>";
                    if(strtoupper($ans) === strtoupper($_POST[$quesId]))
                    {
                        $correctAnswer++;

                    }
                  }
                  else{
                      $resbody = $resbody . "X";
                      $notAnswered++;
                     // echo "undefined variable "."<br>";
                  }
              }
              $wrongAnswer = $noOfQuestions - $correctAnswer - $notAnswered;
             // echo "<br>"."<br>";
             /* echo "total question ".$noOfQuestions."<br>";
              echo "correct answer ".$correctAnswer."<br>";
              echo "unanswered answer ".$notAnswered."<br>";
              echo "wrong answer ".$wrongAnswer."<br>";
              echo "response body ".$resbody."<br>"; */
              $sql7="insert into quizresponse(qid,sid,cid,resbody,actualAns)values($qid,$sid,$cid,'$resbody','$actualAns')";
              $res7=mysqli_query($conn,$sql7);

        if($res){}
        else{
           header("Location: takeTest.php");
        $_SESSION['TestMessage']="<div class='chip red black-text'>Error Submitting Test</div>";
        die("Error Adding Test");

       }

            }
            ?>
            <div class="card-panel center  teal lighten-5" style="margin-top:1px">
            <h5 style="font-variant: small-caps; font-weight: bold;">Results</h5>
            <div class="card-panel  teal lighten-5" style="margin-top:1px">
            <center>
            <table class="responsive-table centered highlight striped">
            <tbody>
            <tr>
             <th>Course&nbsp;Code</th>
             <td><?php echo $courseCode;?></td>
            </tr>
          <tr>
          <th>Total&nbsp;Questions</th>
            <td><?php echo $noOfQuestions;?></td>
          </tr>
          <tr>
          <th>Correct&nbsp;Answered</th>
            <td><?php echo $correctAnswer;?></td>
          </tr>
          <tr>
          <th>Wrong&nbsp;Answered</th>
            <td><?php echo $wrongAnswer;?></td>
          </tr>
          <tr>
          <th>Not&nbsp;Attempted</th>
            <td><?php echo $notAnswered; ?> </td>
          </tr>
          <tr>
          <th>Marks&nbsp;Obtained</th>
            <td><?php  echo ($correctAnswer*4) ;?></td>
          </tr>
        </tbody>
      </table>
      </center>
            </div>
            </div>

            <?php

}
else
{

    header("Location: takeTest.php");
        $_SESSION['TestMessage']="<div class='chip red black-text'>Invalid Access</div>";
        die("No Questions Available");
}
?>