<?php
    include "header.php";   
?>
<?php
if($conn)
 {
     if(isset($_POST['submit'])) 
     {
         $course=$_POST['course'];
            $testTitle=$_POST['title'];
            $deadline=$_POST['deadline'];
            $noOfQuestions=intval($_POST['noOfQuestions']);

            $course=mysqli_real_escape_string($conn,$course);
            $testTitle=mysqli_real_escape_string($conn,$testTitle);
            $deadline=mysqli_real_escape_string($conn,$deadline);

            $course=htmlentities( $course);
            $testTitle=htmlentities( $testTitle);
            $deadline=htmlentities( $deadline);
            
            $today = new DateTime('now');
            $deadline=date_create($deadline);
            $diff=date_diff($today,$deadline);
           // echo $diff->format("%R%a days")."<br>";
            if($diff->format("%R%a days") < 0){
               // header("Location: createTest.php");
               $_SESSION['fmessage']="<div class='chip red black-text'>Deadline Expired</div>";
               die("Deadline Date Expired");
            }
            if($noOfQuestions > 20){
                header("Location: createTest.php");
               $_SESSION['fmessage']="<div class='chip red black-text'>Maximum Questions Limit Exceeded</div>";
               die("Maximum Questions Limit Exceeded");
            }

            if($noOfQuestions < 0){
                header("Location: createTest.php");
               $_SESSION['fmessage']="<div class='chip red black-text'>Negative Value Not Allowed</div>";
               die("Negative Value Not Allowed");
            }

            $sql1="SELECT * FROM course where cid='$course' ";
            $res1=mysqli_query($conn,$sql1);
            $row1=mysqli_fetch_assoc($res1);
            $title=$row1['title'];
            $fid=$row1['fid'];
            $endDate=$row1['endDate'];
            echo $endDate;

            $endDate=date_create($endDate);
            $diff=date_diff($deadline,$endDate);
            //Check if deadline is less than endDate of course
            if($diff->format("%R%a days") < 0){
               header("Location: createTest.php");
              $_SESSION['fmessage']="<div class='chip red black-text'>Deadline Cannot be more than Course EndDate</div>";
              die("Deadline Date Expired");
           }

            $sql="insert into quiz(cid,title,noOfQuestions,deadline,fid) values($course,'$testTitle',$noOfQuestions,'$deadline',$fid)";
            $res=mysqli_query($conn,$sql);
            

            

            if($res)
            {
                
            }else{
                header("Location: createTest.php");
               $_SESSION['fmessage']="<div class='chip red black-text'>Something Went Wrong</div>";
               die("Something Went Wrong");
            }
            
            
            

     }else{
        header("Location: createTest.php");
        $_SESSION['fmessage']="<div class='chip red black-text'>Something Went Wrong</div>";
        die("Something Went Wrong");
     }
     ?>
     <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="../css/main.css" />
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>Faculty </title>
      
      <style>
      ::-webkit-input-placeholder { /* WebKit, Blink, Edge */
        color:    #909;
        }
        :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
        color:    #909;
        opacity:  1;
        }
        ::-moz-placeholder { /* Mozilla Firefox 19+ */
        color:    #909;
        opacity:  1;
        }
        :-ms-input-placeholder { /* Internet Explorer 10-11 */
        color:    #909;
        }
        ::-ms-input-placeholder { /* Microsoft Edge */
        color:    #909;
        }

        ::placeholder { /* Most modern browsers support this now. */
        color:    #909;

        }
          /* to prevent items from hiding under sidenav */
          header , .main2 , footer {
              padding-left: 100px;
              padding-right: 100px;
          }
          @media only screen and (max-width : 992px){
              header , .main2 , footer{
                  padding-left: 0;
              }
          }

      </style>
       

    </head>

    <body>
    <div class='main2'>
    <div class="col l6 offset-l3 m8 offset-m2 s12" id="login" style="margin:20px;">
      <div class="card-panel  teal lighten-5" style="margin-top:1px">
        <center><h5 style="font-variant: small-caps; font-weight: bold;"><u>Add&nbsp;Questions</u></h5></center>
        <form action="createTestFinal.php" method="POST" >
        <div class="input-field">
            <i class="material-icons red-text prefix">subtitles</i>
            <input type="number" id="cid" name="cid" required readonly value="<?php echo $course?>" >
            <label for="cid">Course&nbsp;Id</label>
          </div>
        <div class="input-field">
            <i class="material-icons red-text prefix">subtitles</i>
            <input type="text" id="title" name="courseTitle" required readonly value="<?php echo $title?>" >
            <label for="title">Course&nbsp;Title</label>
          </div>
          <div class="input-field">
            <i class="material-icons red-text prefix">format_list_numbered</i>
            <input type="number" id="noOfQuestions" name="noOfQuestions" readonly value="<?php echo $noOfQuestions?>">
            <label for="noOfQuestions">Number&nbsp;Of&nbsp;Questions&nbsp;(At Max 20&nbsp;)</label>
          </div>
          <div class="row" id="question">
          <?php
         // $noOfQuestions=intval($_POST['noOfQuestions']);
            $option = 1;
            $answer = 1;
            for ($i=0;$i<$noOfQuestions;$i++){
                // alert("Hii");
                $code= '<div class="input-field">';
                $code=$code .'Question&nbsp;'.($i+1).'&nbsp;<input type="text" required name="question' ;
                 $code = $code . ($i+1).'"></div>';
                 
                 $code =$code .'<div class="input-field ">';
                 $code =$code .'<input type="text" required placeholder="Option A" name="option';
                 $code = $code . $option .'"></div>';
                 $option++;
                 
 
                  $code.='<div class="input-field ">';
                  $code =$code . '<input type="text" required placeholder="Option B" name="option';
                 $code = $code . $option .'"></div>';
                $option++; 
                 
                 $code =$code .'<div class="input-field ">';
                 $code =$code . '<input type="text" required placeholder="Option C" name="option';
                 $code = $code . $option .'"></div>';
                 $option++; 
                 
                 $code =$code .'<div class="input-field ">';
                 $code =$code . '<input type="text" required placeholder="Option D" name="option';
                 $code = $code . $option .'"></div>';
                 $option++;
 
                 $code =$code .'<div class="input-field ">';
                 $code=$code.'Answer&nbsp;' . ($i+1) . '&nbsp';
                 $code=$code . '<input type="text" required placeholder="Either A ,B , C , D" name="answer';
                 $code = $code . $answer .'"></div>';
                 $answer++;
                 echo $code;
                 
                 //echo "Hello"."<br>";

            }



            ?>
          </div>
          
          <center><input type="submit" name="submit" value="Submit" class="btn btn-large"></center>
        </form>
    </div>
    </div>
    </div>


    </body>

    <?php
 }
 else{
            header("Location: createTest.php");
               $_SESSION['fmessage']="<div class='chip red black-text'>Something Went Wrong</div>";
               die("Something Went Wrong");
 }
    
    ?>
    
 <script type="text/javascript" src="../js/jquery.js"></script>
  <script type="text/javascript" src="../js/materialize.min.js"></script>
  <script>
    $(document).ready(function () {
      // Custom JS & jQuery here
     
	 
    });
  </script>

  

  
  </body>

</html>

