<?php
  include "navbar.php";
  ?>
  

  <div class="main">
    <div class="col l6 offset-l3 m8 offset-m2 s12" id="login" style="margin:20px;">
      <div class="card-panel center  teal lighten-5" style="margin-top:1px">
        <h5 style="font-variant: small-caps; font-weight: bold;">Add&nbsp;Course</h5>
		 <?php
           if(isset($_SESSION['courseAddmessage']))
           {
             echo $_SESSION['courseAddmessage'];
             unset($_SESSION['courseAddmessage']);
            }
        ?>

        <form action="addNewCourse.php" method="POST" enctype="multipart/form-data">
          
          <div class="input-field">
            <i class="material-icons red-text prefix">assignment</i>
            <input type="text" id="title" name="courseCode" required  >
            <label for="title">Course&nbsp;Code</label>
          </div>
          <div class="input-field">
            <i class="material-icons red-text prefix">assignment</i>
            <input type="text" id="title" name="title" required >
            <label for="title">Course&nbsp;Title</label>
          </div>
          <div class="input-field">
            <i class="material-icons red-text prefix">account_circle</i>
            <input type="number" id="fid" name="fid" required >
            <label for="fid">Faculty&nbsp;Id</label>
          </div>
		  <div class="input-field">
              
              <i class="material-icons red-text prefix">date_range</i>
              <input name="startDate" type="text" required onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'"> 
              <label for="startDate">Start-Date</label>
          </div>
          <div class="input-field">
              
              <i class="material-icons red-text prefix">date_range</i>
              <input name="endDate" required type="text" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'"> 
              <label for="endDate">End-Date</label>
          </div>
		  <!-- For Videos Upload -->
		  <div class="input-field">
            <i class="material-icons red-text prefix">video_library</i>
            <input type="number" id="video" name="videoField"  required>
            <label for="title">Enter&nbsp;Number&nbsp;Of&nbsp;Videos&nbsp;To&nbsp;Upload&nbsp;(&nbsp;At&nbsp;Max&nbsp;10&nbsp;)</label>
			
          </div>
		  <input type="button" id="videoBtn" name="video" value="Upload&nbsp;Videos" class="btn">
		  <div class="row" id="vidContainer">
		 
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
		  
		  
          
          
          
            <div class="input-field">
            <select name="department" id="department">
              <option value="civilEngineering">Civil&nbsp;Engineering</option>
              <option value="computerScience">Computer&nbsp;Science</option>
              <option value="electronicsAndCommunication">Electronics&nbsp;&&nbsp;Communication</option>
              <option value="electricalEngineering">Electrical&nbsp;Engineering</option>
              <option value="mechanicalEngineering">Mechanical&nbsp;Engineering</option>
              <option value="chemistry">Chemistry</option>
              <option value="physics">Physics</option>
              <option value="mathematics">Mathematics</option>
              
            </select>
            <label for="department">Offered&nbsp;By</label>
            </div>
            
          
          <input type="submit" name="submit" value="Submit" class="btn btn-large">
        </form>
      </div>
    </div>
  </div>
 
 
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
     
	  
		$('select').material_select();
		$('#videoBtn').click(function(){
			
			
			var number = Number(document.getElementById("video").value);
            var vidContainer = document.getElementById("vidContainer");
			
			if(vidContainer.hasChildNodes()) {
			
				$("#vidContainer").empty();
               
            }
			//alert('hello');
			
			 for (i=0;i<number;i++){
			 var code='<div class="file-field input-field"><div class="btn"><span>Upload&nbsp';
			 code+=(i+1)+'&nbsp;Video</span><input type="file" name="video';
			 code+=(i+1)+'"></div><div class="file-path-wrapper"><input class="file-path validate" type="text"></div></div>';
			 $("#vidContainer").append(code);
			 
			 }
			console.log(code);
		});
		
		
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
			//alert('hello');
			
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
  
