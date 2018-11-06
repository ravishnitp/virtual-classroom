<?php
include "navbar.php";

if ($_SESSION['fusername']) {
    if (isset($_GET['id'])) {
        $username = $_SESSION['fusername'];
        $sql1     = "SELECT * FROM faculty where username='$username' ";
        $res1     = mysqli_query($conn, $sql1);
        $row1     = mysqli_fetch_assoc($res1);
        $fid      = $row1['fid'];
        
        $cid = $_GET['id'];
        $cid = mysqli_real_escape_string($conn, $cid);
        $cid = htmlentities($cid);
        echo $cid . "<br>";
        echo $fid . "<br>";
        $sql2 = "SELECT * FROM course where cid=$cid ";
        $res2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($res2);
        
?>

	<!-- video Adding Here -->
	<div class="main">
    <div class="col l6 offset-l3 m8 offset-m2 s12" id="login" style="margin:20px;">
      <div class="card-panel center  teal lighten-5" style="margin-top:1px">
        <h5 style="font-variant: small-caps; font-weight: bold;">Add&nbsp;Documents</h5>
		 <?php
        if (isset($_SESSION['fcourseAddmessage'])) {
            echo $_SESSION['fcourseAddmessage'];
            unset($_SESSION['fcourseAddmessage']);
        }
?>

        <form action="addNewDocument.php" method="POST" enctype="multipart/form-data">
		<?php
        $user = $_SESSION['fusername'];
        $sql  = "select * from faculty where username='$user'";
        $res  = mysqli_query($conn, $sql);
        $row  = mysqli_fetch_assoc($res);
        //Example echo $row['email'];
?>
		<div class="input-field">
            <i class="material-icons red-text prefix">assignment</i>
            <input type="number" id="cid" name="cid" readonly value="<?php echo strtoupper($cid);?>"  >
            <label for="title">Course&nbsp;Id</label>
          </div>
          
          <div class="input-field">
            <i class="material-icons red-text prefix">assignment</i>
            <input type="text" id="title" name="courseCode" readonly value="<?php echo strtoupper($row2['courseCode']);?>"  >
            <label for="title">Course&nbsp;Code</label>
          </div>
          <div class="input-field">
            <i class="material-icons red-text prefix">assignment</i>
            <input type="text" id="title" name="title" readonly value="<?php echo strtoupper($row2['title']);?>" >
            <label for="title">Course&nbsp;Title</label>
          </div>
          <div class="input-field">
            <i class="material-icons red-text prefix">account_circle</i>
            <input type="text" id="username" name="username" readonly value="<?php echo strtoupper($row['username']);?>" >
            <label for="fid">Faculty&nbsp;Username</label>
          </div>
		  
		  <!-- For document Upload -->
		  
		  <div class="input-field">
            <i class="material-icons red-text prefix">assignment</i>
            <input type="number" id="doc" name="docField" required >
            <label for="title">Enter&nbsp;Number&nbsp;Of&nbsp;Documents&nbsp;To&nbsp;Upload&nbsp;(&nbsp;At&nbsp;Max&nbsp;10&nbsp;)</label>
			
          </div>
		  <input type="button" id="docBtn" name="document" value="Upload&nbsp;Documents" class="btn">
		  <div class="row" id="docContainer">
		 
		  </div>
		  
		  
		  
            
          
          <input type="submit" name="submit" value="Submit" class="btn btn-large">
        </form>
      </div>
    </div>
  </div>
	
	
<?php
    }
} else {
    $_SESSION['fmessage'] = "<div class='chip red black-text'>Invalid Access</div>";
    header("Location: facultyLogin.php");
    die("Login To Continue ");
}
?>

<script type="text/javascript" src="../js/jquery.js"></script>
  <script type="text/javascript" src="../js/materialize.min.js"></script>
  <script>
    $(document).ready(function () {
      // Custom JS & jQuery here
      $('.button-collapse').sideNav();
	 
    });
  </script>

  

  <script>
    $(document).ready(function () {
      // Custom JS & jQuery here
     
		$('#docBtn').click(function(){
			var number = Number(document.getElementById("doc").value);
            var docContainer = document.getElementById("docContainer");
			if(docContainer.hasChildNodes()) {
				$("#docContainer").empty();
			}
			for (i=0;i<number;i++){
			 var codes='<div class="file-field input-field"><div class="btn"><span>Upload&nbsp';
			 codes+=(i+1)+'&nbsp;Document</span><input type="file" name="doc';
			 codes+=(i+1)+'"></div><div class="file-path-wrapper"><input class="file-path validate" type="text"></div></div>';
			 $("#docContainer").append(codes);
			 }
			console.log(codes);
		});
	});
  </script>
  </body>
  </html>