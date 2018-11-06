<?php
    include "navbar.php";   
?>
      
      <div class="main">
        <nav class="blue">
            <div class="nav-wrapper">
                <div class="container">
                    <a href="" class="brand-logo right ">Create&nbsp;Test</a>
                </div>

            </div>
        </nav>

        <div class="card-panel">
        <?php
        if(isset($_SESSION['smessage']))
            {
            echo $_SESSION['smessage'];
            unset($_SESSION['smessage']);
            }
            ?>
        <form action="assignmentCheck.php" method="POST">
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
                                    $opt .="<option value='{$row['courseCode']}'>{$row['title']}</option>\n";

                                }
                                $opt .= "</select>";
                            
        ?>
          
            <div class="input-field" style="padding-left:20px;">
                <?php
                    echo $opt;
                ?>
            <label for="course" class="red-text">Select&nbsp;Course&nbsp;For&nbsp;Assignment</label>
            </div>
            
            <h5>Assignment&nbsp;Title</h5>
            <textarea name="title" class="materialize-textarea" placeholder="Title"></textarea>
            <h5>Assignment&nbsp;Body</h5>
            <textarea name="ckeditor" id="ckeditor" class="ckeditor"></textarea>
            <br>
            <div class="center">
            <input type="submit" value="Submit" name="submit" class="btn white-text"> 
            </div>
            
          
         
        </form>
        </div>
       

            
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