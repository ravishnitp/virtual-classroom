<?php
include "navbar.php";
?>

<div class="main">
    <?php

if($_SESSION['susername'] )
{
	 $qrid = $_GET['qrid'];
    $user = $_SESSION['susername'];
    $sql5 = "select * from students where username='$user'";
    $res5 = mysqli_query($conn, $sql5);
    $row5 = mysqli_fetch_assoc($res5);
    $sid  = $row5['sid'];
	
	$sql9         = "select * from quizresponse  where qrid=$qrid  ";
    $res9         = mysqli_query($conn, $sql9);
    $row9 = mysqli_fetch_assoc($res9);
    $qid = $row9['qid'];
	$quizResponse = $row9['resbody'];
	$actualAns=$row9['actualAns'];
	//echo "a ans ".$actualAns."<br>";
	//echo" b ans ".$quizResponse."<br>";
	
	

   
	
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
    $correctAnswer = 0;
    $notAnswered = 0;
	
	for($i = 0;$i<$noOfQuestions;$i++)
	{
		//echo $quizResponse[$i]." ".$actualAns[$i]."<br>";
			if($quizResponse[$i] === 'X') 
			{
				$notAnswered++;
			}
			else if($quizResponse[$i] === $actualAns[$i])
			{
				$correctAnswer++;
			}
	}
          
          
              $wrongAnswer = $noOfQuestions - $correctAnswer - $notAnswered;
             
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