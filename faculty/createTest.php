<?php
    include "navbar.php";   
?>

<div class="main">
<div class="col l6 offset-l3 m8 offset-m2 s12" id="login" style="margin:20px;">
      <div class="card-panel center  teal lighten-5" style="margin-top:1px">
        <h5 style="font-variant: small-caps; font-weight: bold;">Test&nbsp;Details</h5>
		 <?php
           if(isset($_SESSION['fmessage']))
           {
             echo $_SESSION['fmessage'];
             unset($_SESSION['fmessage']);
            }
        ?>
        <form action="createTest2.php" method="POST" >
        
            <?php
                        $username=$_SESSION['fusername'];
                        $sql1="SELECT * FROM faculty where username='$username' ";
                        $res1=mysqli_query($conn,$sql1);
                        $row1=mysqli_fetch_assoc($res1);
                        $fid=$row1['fid'];
                        // assignment for ongoing Course Only
                        $sql="select * from course where startDate <=CURDATE() AND endDate >= CURDATE() AND fid=$fid order by cid  ";
                         $res=mysqli_query($conn,$sql);
                         if(mysqli_num_rows($res)<=0)
                            {
                                echo "<div class='chip red white-text'>No&nbsp;OnGoing&nbsp;Courses</div>";
                            }else{
                                $opt="<select name='course' id='course'>";
                                while($row = mysqli_fetch_assoc($res)){
                                    $opt .="<option value='{$row['cid']}'>{$row['title']}</option>\n";

                                }
                                $opt .= "</select>";
                            
        ?>

            <div class="input-field" style="padding-left:20px;">
                <?php
                    echo $opt;
                ?>
                <label for="course" class="red-text">Select&nbsp;Course&nbsp;For&nbsp;Test</label>
            </div>

            <div class="input-field">
            <i class="material-icons red-text prefix">subtitles</i>
            <textarea name="title" class="materialize-textarea" id="title" required></textarea>
            <label for="title">Title</label>
          </div>

            
            

            <div class="input-field">
            <i class="material-icons red-text prefix">format_list_numbered</i>
            <input type="number" id="noOfQuestions" name="noOfQuestions" required>
            <label for="noOfQuestions">Number&nbsp;Of&nbsp;Questions&nbsp;(At Max 20&nbsp;)</label>
          </div>

            <div class="input-field">
              
              <i class="material-icons red-text prefix">date_range</i>
              <input required name="deadline" type="text" required onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'"> 
              <label for="deadline">DeadLine</label>
          </div>
          <input type="submit" value="Submit" name="submit" class="btn btn-large white-text">
                


             
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