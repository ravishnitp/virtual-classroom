<?php
    include "navbar.php";   
?>

<div class="main">
<?php
        $user=$_SESSION['susername'];
        $sql5="select * from students where username='$user'";
        $res5=mysqli_query($conn,$sql5);
        $row5=mysqli_fetch_assoc($res5);
        $sid=$row5['sid'];
    ?>
    <nav class="blue">
        <div class="nav-wrapper">
            <div class="container">
                <a href="" class="brand-logo right ">Create&nbsp;Doubt</a>
            </div>

        </div>
    </nav>

    
        <?php
        if(isset($_SESSION['doubtmessage']))
            {
            echo $_SESSION['doubtmessage'];
            unset($_SESSION['doubtmessage']);
            }
            //
            ?>
        <form action="newDoubtCheck.php" method="POST" enctype="multipart/form-data">
        <div class="card-panel">
            <?php
            //get all enrolled current course
$sql="select * from enrollment inner join course where  enrollment.cid = course.cid and course.startDate <=CURDATE() ANd course.endDate >= CURDATE()  and enrollment.sid = $sid    order by course.cid  ";

$res=mysqli_query($conn,$sql);
/*print_r($res);
echo "<br>";*/
                         if(mysqli_num_rows($res)<=0)
                            {
                                echo "<div class='chip red white-text'>No&nbsp;Enrolled&nbsp;Courses</div>";
                            }else{
                                $opt="<select name='course' id='course'>";
                                while($row = mysqli_fetch_assoc($res)){
                                   /* print_r($row);
                                    echo "<br>";*/

                                    $opt .="<option value='{$row['cid']}'>{$row['title']}</option>\n";

                                }
                                $opt .= "</select>";
                            
        ?>

            <div class="input-field" style="padding-left:20px;">
                <?php
                    echo $opt;
                ?>
                <label for="course" class="red-text">Select&nbsp;Course&nbsp;For&nbsp;Doubt</label>
            </div>

            <h5>Doubt&nbsp;Title</h5>
            <textarea name="title" class="materialize-textarea" placeholder="Title"></textarea>
            <h5>Doubt&nbsp;Body</h5>
            <textarea name="body" id="ckeditor" class="ckeditor"></textarea>
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
    include "footer.php";
    ?>


<script>
    $(document).ready(function () {
        // Custom JS & jQuery here
        $('select').material_select();
    });
</script>