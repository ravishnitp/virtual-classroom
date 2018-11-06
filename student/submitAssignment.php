<?php
include "navbar.php";
if($_SESSION['susername'] && isset($_GET['aid'])   )
{
    $user = $_SESSION['susername'];
    $sql5 = "select * from students where username='$user'";
    $res5 = mysqli_query($conn, $sql5);
    $row5 = mysqli_fetch_assoc($res5);
    $sid  = $row5['sid'];

    $aid = $_GET['aid'];
    $sql         = "select * from assignment  where assignment_Id=$aid  ";
    $res         = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $aBody = $row['body'];
    $aTitle = $row['title'];
    $cid = $row['cid'];
?>
<div class="main">
    <nav class="blue">
        <div class="nav-wrapper">
            <div class="container">
                <a href="" class="brand-logo right ">Submit&nbsp;Assignment</a>
            </div>

        </div>
    </nav>

    
        <?php
        if(isset($_SESSION['assignmentMessage']))
            {
            echo $_SESSION['assignmentMessage'];
            unset($_SESSION['assignmentMessage']);
            }
            ?>
        <form action="submitAssignmentCheck.php" method="POST" enctype="multipart/form-data">
        <div class="card-panel">
            

            <div class="input-field">
            <input name="aid" readonly value="<?php echo $aid;?>" id="aid" type="text"  >
            <label for="aid">Assignment&nbsp;Id</label>
          </div>
          <div class="input-field">
            <input name="title" readonly value="<?php echo $aTitle;?>" id="title" type="text"  >
            <label for="title">Assignment&nbsp;Title</label>
          </div>
          <h5>Question</h5>
            <textarea name="aBody" readonly id="ckeditor" class="ckeditor"><?php echo $aBody?></textarea>
            <br>
            <h5>Response&nbsp;Body</h5>
            <textarea name="rBody"  id="ckeditor" class="ckeditor"></textarea>
            <br>
            <div class="center">
                <input type="submit" value="Submit" name="submit" class="btn white-text">
            </div>


             </div>
        </form>
   



</div>
<script type="text/javascript" src="../js/ckeditor/ckeditor.js"></script>

<?php
}
else{
    header("Location: takeAssignment.php");
    $_SESSION['assignmentMessage']="<div class='chip red black-text'>Something Went Wrong</div>";
    die("error");
}
    include "footer.php";
    
    ?>
