<?php
    include "header.php";   
?>
<?php

                $sql2="SELECT * FROM quiz order by `qid` desc  LIMIT 1 ";
                $res2=mysqli_query($conn,$sql2);
                $row2=mysqli_fetch_assoc($res2);
                $qid=$row2['qid'];
                //echo $qid;
 if($conn)
 {
     if(isset($_POST['submit'])) 
     {
        //echo "noOfQuestions"." ".$_POST['noOfQuestions']."<br>";
        //echo "cid "." ".$_POST['cid']."<br>";
        $cid = $_POST['cid'];
        //echo "<br>"."<br>"."<br>"."<br>";
        $option = 1;
        $answer = 1;
        $noOfQuestions = $_POST['noOfQuestions'];
        /*checking validity of answer option */

        for($i = 1 ; $i <= $noOfQuestions;$i++){
            if(strtoupper($_POST['answer'.$i])!='A' &&  strtoupper($_POST['answer'.$i])!='B'  && strtoupper($_POST['answer'.$i])!='C' && strtoupper($_POST['answer'.$i])!='D'){
                //echo "invalid option"."<br>";  /*ERROR RETURN at Last */
                $sql3="delete FROM quiz where qid=$qid ";
                $res3=mysqli_query($conn,$sql3);

                header("Location: createTest.php");
               $_SESSION['fmessage']="<div class='chip red black-text'>Invalid Options</div>";
               die("Something Went Wrong");
            }
        }

        for($i = 1 ; $i <= $noOfQuestions;$i++){
           // echo $cid."<br>";
            $ques =  $_POST['question'.$i] ;
           // echo $ques ."<br>";
            $optA = $_POST['option'.$option] ;
            $option++;
           // echo $optA ."<br>";
            $optB =  $_POST['option'.$option] ;
            $option++;
           // echo $optB ."<br>";
            $optC =  $_POST['option'.$option] ;
            $option++;
           // echo $optC ."<br>";
            $optD =  $_POST['option'.$option] ;
            $option++;
           // echo $optD ."<br>";
            $ans =  $_POST['answer'.$i] ;
			$ans =strtoupper($ans);
            $answer++;
           // echo $ans ."<br>";
           // echo "<br>"."<br>";
            //echo $qid;
            $sql="insert into quizquestions(qid,question,optionA,optionB,optionC,optionD,answer) values($qid,'$ques','$optA','$optB','$optC','$optD','$ans')";
            $res=mysqli_query($conn,$sql);
            

            if($res)
            {
                //echo "question  added "."<br>";
                header("Location: createTest.php");
               $_SESSION['fmessage']="<div class='chip green white-text'>Test Created Successfully</div>";
               //die("Success");
            }
        }
        


     }else{
        header("Location: createTest.php");
               $_SESSION['fmessage']="<div class='chip red black-text'>Invalid Options</div>";
               die("Something Went Wrong");
     }

}else{
    header("Location: createTest.php");
               $_SESSION['fmessage']="<div class='chip red black-text'>Invalid Options</div>";
               die("Something Went Wrong");
}