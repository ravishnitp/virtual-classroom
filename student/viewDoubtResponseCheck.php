<?php
include "navbar.php";
if($_SESSION['susername'] && isset($_GET['drid'])   )
{
    $user = $_SESSION['susername'];
    $sql5 = "select * from students where username='$user'";
    $res5 = mysqli_query($conn, $sql5);
    $row5 = mysqli_fetch_assoc($res5);
    $sid  = $row5['sid'];

    $drid = $_GET['drid'];
    $sql         = "select * from doubtresponse   where dResponseId=$drid  ";
    $res         = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $did = $row['did'];
    $dRBody = $row['body'];
    $dTitle = $row['title'];
    $cid = $row['cid'];
    $sql3         = "select * from doubt   where did=$did  ";
    $res3         = mysqli_query($conn, $sql3);
    $row3 = mysqli_fetch_assoc($res3);
    $que=$row3['que'];

?>
<div class="main">

<form action="submitAssignmentCheck.php" method="POST" enctype="multipart/form-data">
        <div class="card-panel">
            

           
          <div class="input-field">
            <input name="title" readonly value="<?php echo $dTitle;?>" id="title" type="text"  >
            <label for="title">Doubt&nbsp;Title</label>
          </div>
          <h5>Doubt</h5>
            <textarea name="aBody" readonly id="ckeditor" class="ckeditor"><?php echo $que?></textarea>
            <br>
            <h5>Response</h5>
            <textarea name="dRBody"  readonly id="ckeditor" class="ckeditor"><?php echo $dRBody?></textarea>
            <br>
            


             </div>
        </form>

</div>
<script type="text/javascript" src="../js/ckeditor/ckeditor.js"></script>

<?php
}
else{
    header("Location: viewDoubtResponse.php");
   
    die("error");
}
    include "footer.php";
    
    ?>
