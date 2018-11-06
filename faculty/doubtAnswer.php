<?php
include "navbar.php";
if($_SESSION['fusername'] && isset($_GET['did'])   )
{
    $user = $_SESSION['fusername'];
    $sql5 = "select * from faculty where username='$user'";
    $res5 = mysqli_query($conn, $sql5);
    $row5 = mysqli_fetch_assoc($res5);
    $fid  = $row5['fid'];

    $did = $_GET['did'];
    $sql         = "select * from doubt  where did=$did  ";
    $res         = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $dBody = $row['que'];
    $dTitle = $row['dtitle'];
    $cid = $row['cid'];

    
?>
<div class="main">

    <nav class="blue">
        <div class="nav-wrapper">
            <div class="container">
                <a href="" class="brand-logo right ">Resolve&nbsp;Doubt</a>
            </div>

        </div>
    </nav>

    
        <?php
        if(isset($_SESSION['doubtMessage']))
            {
            echo $_SESSION['doubtMessage'];
            unset($_SESSION['doubtMessage']);
            }
            ?>
        <form action="doubtAnswerCheck.php" method="POST" enctype="multipart/form-data">
        <div class="card-panel">
        
        <div class="input-field">
            <input name="did" readonly value="<?php echo $did;?>" id="did" type="text"  >
            <label for="did">Doubt&nbsp;Id</label>
          </div>

          <div class="input-field">
            <input name="title" readonly value="<?php echo $dTitle;?>" id="title" type="text"  >
            <label for="title">Doubt&nbsp;Title</label>
          </div>
          
          <h5>Doubt</h5>
            <textarea name="dBody" readonly id="ckeditor" class="ckeditor"><?php echo $dBody?></textarea>
            <br>
            <h5>Response&nbsp;Body</h5>
            <textarea name="rBody"  id="ckeditor" class="ckeditor"></textarea>
            <br>
            <div class="center">
                <input type="submit" value="Resolve" name="submit" class="btn white-text">
            </div>


             </div>
        </form>
   



</div>
<script type="text/javascript" src="../js/ckeditor/ckeditor.js"></script>

<?php
}
else{
   header("Location: resolveDoubt.php");
    $_SESSION['doubtMessage']="<div class='chip red black-text'>Something Went Wrong</div>";
    die("error");
}
    include "footer.php";
    
    ?>
